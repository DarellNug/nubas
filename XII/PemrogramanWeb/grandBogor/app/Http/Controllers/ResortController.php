<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCategory;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResortController extends Controller
{
    /**
     * Halaman 1: Beranda (Resort Home)
     */
    public function beranda(): View
    {
        $categories = RoomCategory::all();
        
        $showcaseRooms = Room::whereIn('code', ['DF-102', 'ES-304', 'PV-001'])
            ->with('category')
            ->orderBy('price_per_night')
            ->get();

        if ($showcaseRooms->isEmpty()) {
            $showcaseRooms = Room::with('category')->take(3)->get();
        }

        return view('pages.beranda', compact('categories', 'showcaseRooms'));
    }

    /**
     * Halaman 2: Tentang Kami (Suaka Botanikal Parahyangan)
     */
    public function tentangKami(): View
    {
        return view('pages.tentang-kami');
    }

    /**
     * Halaman 3: Galeri Resor & Visual Sanctuary
     */
    public function galeri(): View
    {
        return view('pages.galeri');
    }

    /**
     * Halaman 4: Tim Manajemen (Dewan Kepemimpinan & Eksekutif)
     */
    public function timManajemen(): View
    {
        return view('pages.tim-manajemen');
    }

    /**
     * Halaman 5: Kontak & Lokasi / Formulir Pemesanan Kamar
     */
    public function kontak(Request $request): View
    {
        $categories = RoomCategory::all();
        $rooms = Room::with('category')->orderBy('code')->get();
        $selectedRoomId = $request->query('room_id');
        $selectedCategory = $request->query('category');

        return view('pages.kontak', compact('categories', 'rooms', 'selectedRoomId', 'selectedCategory'));
    }

    /**
     * Handle submission of 3-step Reservation Request Form
     */
    public function storeReservasi(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:50',
            'room_id' => 'nullable|exists:rooms,id',
            'category_id' => 'nullable|exists:room_categories,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'guest_adults' => 'nullable|integer|min:1|max:20',
            'guest_children' => 'nullable|integer|min:0|max:20',
            'special_requests' => 'nullable|array',
            'message' => 'nullable|string|max:2000',
        ]);

        $checkIn = Carbon::parse($validated['check_in_date']);
        $checkOut = Carbon::parse($validated['check_out_date']);
        $nights = max(1, $checkIn->diffInDays($checkOut));

        // Resolve room
        $room = null;
        if (!empty($validated['room_id'])) {
            $room = Room::find($validated['room_id']);
        } elseif (!empty($validated['category_id'])) {
            $room = Room::where('room_category_id', $validated['category_id'])
                ->where('status', 'tersedia')
                ->first() ?: Room::where('room_category_id', $validated['category_id'])->first();
        }

        if (!$room) {
            $room = Room::where('status', 'tersedia')->first() ?: Room::first();
        }

        $totalAmount = $room ? ($room->price_per_night * $nights) : 1850000 * $nights;
        $reservationCode = 'GBR-RES-' . date('Y') . '-' . strtoupper(Str::random(5));
        $specialRequests = $request->input('special_requests', []);
        if (!is_array($specialRequests)) {
            $specialRequests = [$specialRequests];
        }

        $isVip = in_array('VIP Shuttle / Pick-up', $specialRequests) 
            || ($room && str_contains(strtolower($room->name), 'presidential'))
            || ($room && str_contains(strtolower($room->name), 'villa'));

        // Save Reservation
        $reservation = Reservation::create([
            'reservation_code' => $reservationCode,
            'room_id' => $room ? $room->id : null,
            'guest_name' => $validated['guest_name'],
            'guest_email' => $validated['guest_email'],
            'guest_phone' => $validated['guest_phone'],
            'id_type' => 'KTP/Paspor',
            'check_in_date' => $checkIn->toDateString(),
            'check_out_date' => $checkOut->toDateString(),
            'total_nights' => $nights,
            'total_adults' => $validated['guest_adults'] ?? 2,
            'total_children' => $validated['guest_children'] ?? 0,
            'special_requests' => $specialRequests,
            'notes' => $validated['message'] ?? null,
            'total_amount' => $totalAmount,
            'payment_status' => 'pending',
            'reservation_status' => 'pending',
        ]);

        // Save Inquiry record so it reflects in the Inquiry dashboard
        $inquiryCode = 'INQ-' . date('Ymd') . '-' . rand(100, 999);
        Inquiry::create([
            'inquiry_code' => $inquiryCode,
            'room_id' => $room ? $room->id : null,
            'name' => $validated['guest_name'],
            'email' => $validated['guest_email'],
            'phone' => $validated['guest_phone'],
            'inquiry_type' => 'reservation',
            'is_vip' => $isVip,
            'check_in_date' => $checkIn->toDateString(),
            'check_out_date' => $checkOut->toDateString(),
            'guest_count' => ($validated['guest_adults'] ?? 2) + ($validated['guest_children'] ?? 0),
            'special_requests' => $specialRequests,
            'message' => $validated['message'] ?? 'Permintaan reservasi kamar via website resmi',
            'status' => 'new',
            'response_time_minutes' => null,
        ]);

        return redirect()->route('kontak', ['#reservasi' => 1])
            ->with('success', [
                'code' => $reservationCode,
                'name' => $validated['guest_name'],
                'room' => $room ? $room->name : 'Sanctuary Room',
                'check_in' => $checkIn->format('d M Y'),
                'check_out' => $checkOut->format('d M Y'),
                'nights' => $nights,
                'total' => number_format($totalAmount, 0, ',', '.'),
            ]);
    }
}
