<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\User;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    /**
     * Test Page 1: Beranda (Resort Home)
     */
    public function test_beranda_page_loads_with_authentic_pdf_content(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Harmoni Alam');
        $response->assertSee('Ketinggian Puncak Bogor');
        $response->assertSee('1.150 mdpl');
        $response->assertSee('Deluxe Forest View');
        $response->assertSee('Grand Executive Suite');
        $response->assertSee('Presidential Pine Villa');
        $response->assertSee('Lotus Spa');
    }

    /**
     * Test Page 2: Tentang Kami
     */
    public function test_tentang_kami_page_loads_with_authentic_pdf_content(): void
    {
        $response = $this->get('/tentang-kami');
        $response->assertStatus(200);
        $response->assertSee('Warisan Keasrian Tanah Parahyangan Berpadu Kemewahan Modern');
        $response->assertSee('Soméah Hade ka Sémah');
        $response->assertSee('Green Hotel Platinum');
        $response->assertSee('ASEAN Green Hotel Standard');
    }

    /**
     * Test Page 3: Galeri Resor
     */
    public function test_galeri_page_loads_with_authentic_pdf_content(): void
    {
        $response = $this->get('/galeri');
        $response->assertStatus(200);
        $response->assertSee('Potret Keindahan');
        $response->assertSee('Sudut Damai Grand Bogor Resort');
        $response->assertSee('Suite Master Bedroom Gunung Salak');
        $response->assertSee('Infinity Heated Pool Senja');
        $response->assertSee('Sinematik Virtual Tour 4K');
    }

    /**
     * Test Page 4: Tim Manajemen
     */
    public function test_tim_manajemen_page_loads_with_authentic_pdf_content(): void
    {
        $response = $this->get('/tim-manajemen');
        $response->assertStatus(200);
        $response->assertSee('Dedikasi Para Profesional di Balik Senyuman Anda');
        $response->assertSee('Raden Arya Wicaksono, CHA');
        $response->assertSee('Chef Junaidi Hartono');
        $response->assertSee('Melissa Anggraini, B.Sc.');
    }

    /**
     * Test Page 5: Kontak & Lokasi / Reservasi Kamar
     */
    public function test_kontak_page_loads_with_authentic_pdf_content(): void
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
        $response->assertSee('Hubungi Concierge Kami');
        $response->assertSee('Formulir Pemesanan');
        $response->assertSee('Pertanyaan');
        $response->assertSee('WRO-GBR');
        $response->assertSee('+62 811 8900 777');
    }

    /**
     * Test 3-Step Reservation Request Submission
     */
    public function test_guest_can_submit_reservation_inquiry(): void
    {
        $room = Room::first();

        $payload = [
            'guest_name' => 'Bambang Kusuma',
            'guest_email' => 'bambang.kusuma@example.com',
            'guest_phone' => '+62 812 9988 7766',
            'room_id' => $room->id,
            'check_in_date' => date('Y-m-d', strtotime('+3 days')),
            'check_out_date' => date('Y-m-d', strtotime('+5 days')),
            'guest_adults' => 2,
            'guest_children' => 1,
            'special_requests' => ['Romantic / Honeymoon', 'VIP Shuttle / Pick-up'],
            'message' => 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.',
        ];

        $response = $this->post('/reservasi', $payload);
        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('reservations', [
            'guest_name' => 'Bambang Kusuma',
            'guest_email' => 'bambang.kusuma@example.com',
            'room_id' => $room->id,
            'total_nights' => 2,
        ]);

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Bambang Kusuma',
            'email' => 'bambang.kusuma@example.com',
            'inquiry_type' => 'reservation',
            'is_vip' => true,
        ]);
    }

    /**
     * Test Resort Blog / Journal secondary pages
     */
    public function test_frontend_posts_index_loads_successfully(): void
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
        $response->assertSee('Pesona Kebun Botani');
    }

    public function test_frontend_posts_detail_loads_successfully(): void
    {
        $post = Post::first();
        $response = $this->get('/posts/' . $post->id);
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    /**
     * Test Admin Panel (Page 6 in PDF)
     */
    public function test_admin_login_page_loads_successfully(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_dashboard(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_room_inventory(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/rooms');
        $response->assertStatus(200);
        $response->assertSee('Manajemen Inventaris Kamar &amp; Suite', false);
        $response->assertSee('Deluxe Forest View');
        $response->assertSee('DF-102');
    }

    public function test_authenticated_admin_can_access_create_room_page(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/rooms/create');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_reservations(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/reservations');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_inquiries(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/inquiries');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_housekeeping_logs(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/housekeeping-logs');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_room_categories(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/room-categories');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_posts_resource(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/posts');
        $response->assertStatus(200);
    }

    public function test_authenticated_admin_can_access_categories_resource(): void
    {
        $admin = User::where('email', 'admin@grandbogorresort.id')->first();
        $this->actingAs($admin);

        $response = $this->get('/admin/categories');
        $response->assertStatus(200);
    }
}
