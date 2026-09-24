<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HousekeepingLog;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@grandbogorresort.id'],
            [
                'name' => 'Raden Arya Wicaksono, CHA',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'darell.nugraha30@gmail.com'],
            [
                'name' => 'Darell Nugraha',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Room Categories (5 Categories matching PDF)
        $categories = [
            'deluxe' => RoomCategory::create([
                'name' => 'Deluxe Room',
                'slug' => 'deluxe-room',
                'description' => 'Koleksi kamar mewah berpanorama lembah pinus dengan balkon privat dan kasur King Koil Signature.',
                'is_active' => true,
            ]),
            'suite' => RoomCategory::create([
                'name' => 'Grand Executive Suite',
                'slug' => 'grand-executive-suite',
                'description' => 'Suite luas dengan bathtub marmer freestanding, ruang duduk elegan, dan akses VIP Lounge.',
                'is_active' => true,
            ]),
            'villa' => RoomCategory::create([
                'name' => 'Presidential Pine Villa',
                'slug' => 'presidential-pine-villa',
                'description' => 'Vila privat 3 kamar dengan kolam renang air hangat alami, gazebo BBQ, dan private butler 24 jam.',
                'is_active' => true,
            ]),
            'junior' => RoomCategory::create([
                'name' => 'Junior Garden Suite',
                'slug' => 'junior-garden-suite',
                'description' => 'Suite nyaman berteras taman anggrek tropis dengan rain shower mewah dan sentuhan kayu jati alami.',
                'is_active' => true,
            ]),
            'residence' => RoomCategory::create([
                'name' => 'Royal Family Residence',
                'slug' => 'royal-family-residence',
                'description' => 'Penthouse residensial 2 kamar tidur dengan dapur koki kering (kitchenette) dan ruang keluarga megah.',
                'is_active' => true,
            ]),
        ];

        // 3. Core 5 Showcase Rooms (Authentic to Page 6 table)
        $showcaseRooms = [
            [
                'category' => $categories['deluxe'],
                'name' => 'Deluxe Forest View',
                'code' => 'DF-102',
                'location' => 'Lt. 1 Sayap Pinus',
                'capacity_adults' => 2,
                'capacity_children' => 0,
                'price_per_night' => 1850000,
                'price_note' => 'Termasuk Breakfast',
                'area_sqm' => 48,
                'facilities' => ['WiFi', 'Forest Balcony', 'Bathtub'],
                'status' => 'tersedia',
                'thumbnail' => 'rooms/deluxe_forest_view.jpg',
                'description' => 'Balkon privat langsung menghadap keteduhan hutan pinus dengan kasur King Koil Signature, shower mewah, dan panorama asri.',
            ],
            [
                'category' => $categories['suite'],
                'name' => 'Grand Executive Suite',
                'code' => 'ES-304',
                'location' => 'Lt. 3 Menara Puncak',
                'capacity_adults' => 3,
                'capacity_children' => 1,
                'price_per_night' => 3400000,
                'price_note' => 'Executive Lounge Access',
                'area_sqm' => 86,
                'facilities' => ['King Size', 'Espresso Bar', 'Jacuzzi'],
                'status' => 'terisi_in_house',
                'thumbnail' => 'rooms/grand_executive_suite.jpg',
                'description' => 'Ruang tamu terpisah, bathtub marmer freestanding dengan panorama gunung, serta akses istimewa ke Executive Lounge.',
            ],
            [
                'category' => $categories['villa'],
                'name' => 'Presidential Pine Villa',
                'code' => 'PV-001',
                'location' => 'Private Villa Enclave',
                'capacity_adults' => 6,
                'capacity_children' => 2,
                'price_per_night' => 7800000,
                'price_note' => 'Private Butler 24 Jam',
                'area_sqm' => 210,
                'facilities' => ['Private Pool', 'Pine Sundeck', '24h Butler'],
                'status' => 'maintenance',
                'thumbnail' => 'rooms/presidential_pine_villa.jpg',
                'description' => 'Kenyamanan tanpa kompromi: 3 kamar tidur, kolam renang hangat pribadi, gazebo BBQ, dapur koki, dan layanan butler 24 jam.',
            ],
            [
                'category' => $categories['junior'],
                'name' => 'Junior Garden Suite',
                'code' => 'JG-211',
                'location' => 'Lt. 2 Taman Anggrek',
                'capacity_adults' => 2,
                'capacity_children' => 1,
                'price_per_night' => 2150000,
                'price_note' => 'Termasuk Breakfast',
                'area_sqm' => 62,
                'facilities' => ['Garden Patio', 'Rain Shower', 'Smart TV 55"'],
                'status' => 'tersedia',
                'thumbnail' => 'rooms/junior_garden_suite.jpg',
                'description' => 'Teras langsung ke taman anggrek tropis dengan rain shower mewah dan interior kayu jati bernuansa Parahyangan.',
            ],
            [
                'category' => $categories['residence'],
                'name' => 'Royal Family Residence',
                'code' => 'RF-501',
                'location' => 'Penthouse Level',
                'capacity_adults' => 5,
                'capacity_children' => 2,
                'price_per_night' => 5200000,
                'price_note' => '2 Kamar Tidur + Pantry',
                'area_sqm' => 140,
                'facilities' => ['Kitchenette', '2 Bedroom', 'Minibar'],
                'status' => 'terisi_checkout_besok',
                'thumbnail' => 'rooms/royal_family_residence.jpg',
                'description' => 'Hunian penthouse privat dengan dua kamar tidur besar, dapur kering modern (kitchenette), dan ruang santai keluarga yang megah.',
            ],
        ];

        $createdRooms = [];
        foreach ($showcaseRooms as $item) {
            $cat = $item['category'];
            unset($item['category']);
            $item['room_category_id'] = $cat->id;
            $createdRooms[] = Room::create($item);
        }

        // 4. Generate Remaining Units to perfectly reach 48 Units (8 Tersedia, 38 Terisi, 2 Maintenance)
        // Already created: 2 Tersedia (DF-102, JG-211), 1 Terisi In-House (ES-304), 1 Terisi Checkout Besok (RF-501), 1 Maintenance (PV-001)
        // Needed:
        // - Tersedia: 6 more (Total 8)
        // - Maintenance: 1 more (Total 2)
        // - Terisi: 36 more (Total 38, mix of in-house and checkout-besok)
        // Total = 5 + 6 + 1 + 36 = 48 units!

        $unitTemplates = [
            ['cat' => $categories['deluxe'], 'prefix' => 'DF', 'name' => 'Deluxe Forest View', 'loc' => 'Sayap Pinus', 'cap' => 2, 'price' => 1850000, 'note' => 'Termasuk Breakfast', 'sqm' => 48, 'fac' => ['WiFi', 'Forest Balcony', 'Bathtub'], 'thumb' => 'rooms/deluxe_forest_view.jpg'],
            ['cat' => $categories['suite'], 'prefix' => 'ES', 'name' => 'Grand Executive Suite', 'loc' => 'Menara Puncak', 'cap' => 3, 'price' => 3400000, 'note' => 'Executive Lounge Access', 'sqm' => 86, 'fac' => ['King Size', 'Espresso Bar', 'Jacuzzi'], 'thumb' => 'rooms/grand_executive_suite.jpg'],
            ['cat' => $categories['villa'], 'prefix' => 'PV', 'name' => 'Presidential Pine Villa', 'loc' => 'Private Villa Enclave', 'cap' => 6, 'price' => 7800000, 'note' => 'Private Butler 24 Jam', 'sqm' => 210, 'fac' => ['Private Pool', 'Pine Sundeck', '24h Butler'], 'thumb' => 'rooms/presidential_pine_villa.jpg'],
            ['cat' => $categories['junior'], 'prefix' => 'JG', 'name' => 'Junior Garden Suite', 'loc' => 'Taman Anggrek', 'cap' => 2, 'price' => 2150000, 'note' => 'Termasuk Breakfast', 'sqm' => 62, 'fac' => ['Garden Patio', 'Rain Shower', 'Smart TV 55"'], 'thumb' => 'rooms/junior_garden_suite.jpg'],
            ['cat' => $categories['residence'], 'prefix' => 'RF', 'name' => 'Royal Family Residence', 'loc' => 'Penthouse Level', 'cap' => 5, 'price' => 5200000, 'note' => '2 Kamar Tidur + Pantry', 'sqm' => 140, 'fac' => ['Kitchenette', '2 Bedroom', 'Minibar'], 'thumb' => 'rooms/royal_family_residence.jpg'],
        ];

        // 6 remaining 'tersedia'
        for ($i = 1; $i <= 6; $i++) {
            $tmpl = $unitTemplates[$i % 5];
            $floor = ($i % 3) + 1;
            $code = sprintf('%s-%d%02d', $tmpl['prefix'], $floor, $i + 15);
            $createdRooms[] = Room::create([
                'room_category_id' => $tmpl['cat']->id,
                'name' => $tmpl['name'],
                'code' => $code,
                'location' => "Lt. {$floor} {$tmpl['loc']}",
                'capacity_adults' => $tmpl['cap'],
                'capacity_children' => 0,
                'price_per_night' => $tmpl['price'],
                'price_note' => $tmpl['note'],
                'area_sqm' => $tmpl['sqm'],
                'facilities' => $tmpl['fac'],
                'status' => 'tersedia',
                'thumbnail' => $tmpl['thumb'],
                'description' => "Unit santuari {$tmpl['name']} di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.",
            ]);
        }

        // 1 remaining 'maintenance'
        $maintTmpl = $unitTemplates[2]; // Villa
        $createdRooms[] = Room::create([
            'room_category_id' => $maintTmpl['cat']->id,
            'name' => $maintTmpl['name'],
            'code' => 'PV-002',
            'location' => 'Private Villa Enclave',
            'capacity_adults' => 6,
            'capacity_children' => 2,
            'price_per_night' => 7800000,
            'price_note' => 'Private Butler 24 Jam',
            'area_sqm' => 210,
            'facilities' => ['Private Pool', 'Pine Sundeck', '24h Butler'],
            'status' => 'maintenance',
            'thumbnail' => $maintTmpl['thumb'],
            'description' => 'Unit vila sedang dalam pemeliharaan berkala sistem filtrasi termal kolam renang air hangat.',
        ]);

        // 36 remaining 'terisi' (mix of 'terisi_in_house' and 'terisi_checkout_besok')
        for ($i = 1; $i <= 36; $i++) {
            $tmpl = $unitTemplates[$i % 5];
            $floor = ($i % 4) + 1;
            $code = sprintf('%s-%d%02d', $tmpl['prefix'], $floor, $i + 30);
            $status = ($i % 4 === 0) ? 'terisi_checkout_besok' : 'terisi_in_house';
            $createdRooms[] = Room::create([
                'room_category_id' => $tmpl['cat']->id,
                'name' => $tmpl['name'],
                'code' => $code,
                'location' => "Lt. {$floor} {$tmpl['loc']}",
                'capacity_adults' => $tmpl['cap'],
                'capacity_children' => ($i % 2 === 0 ? 1 : 0),
                'price_per_night' => $tmpl['price'],
                'price_note' => $tmpl['note'],
                'area_sqm' => $tmpl['sqm'],
                'facilities' => $tmpl['fac'],
                'status' => $status,
                'thumbnail' => $tmpl['thumb'],
                'description' => "Unit santuari {$tmpl['name']} sedang dihuni oleh tamu kehormatan Grand Bogor Resort.",
            ]);
        }

        // 5. Seed Inquiries (19 Inquiries Baru with 5 VIP Priorities, exactly matching Page 6)
        $vipInquiries = [
            [
                'name' => 'Bambang Wicaksono',
                'email' => 'bambang.w@jakartatech.vc',
                'phone' => '+62 811 9876 5432',
                'inquiry_type' => 'MICE / Korporat Gathering',
                'is_vip' => true,
                'guest_count' => 120,
                'message' => 'Pemesanan paket Annual Executive Leadership Retreat 3 hari 2 malam untuk 120 delegasi, termasuk penggunaan Grand Ballroom MICE tanpa pilar dan banquet hidangan Sunda autentik.',
                'room_id' => $createdRooms[1]->id, // Grand Executive Suite
            ],
            [
                'name' => 'Kementerian Pariwisata & Ekonomi Kreatif RI',
                'email' => 'protokol@kemenparekraf.go.id',
                'phone' => '+62 812 8888 1945',
                'inquiry_type' => 'MICE / Korporat Gathering',
                'is_vip' => true,
                'guest_count' => 80,
                'message' => 'Permintaan penawaran MICE Gathering Nasional Program Sustainable Tourism. Memerlukan koordinasi keamanan VIP & fasilitas Helipad WRO-GBR untuk rombongan Menteri.',
                'room_id' => $createdRooms[2]->id, // Presidential Pine Villa
            ],
            [
                'name' => 'Dr. Raden H. Sasongko',
                'email' => 'sasongko.raden@medika.org',
                'phone' => '+62 813 1122 3344',
                'inquiry_type' => 'VIP / Helipad Charter',
                'is_vip' => true,
                'guest_count' => 6,
                'message' => 'Reservasi Presidential Pine Villa untuk liburan keluarga besar selama 4 malam. Mohon koordinasi kedatangan via helikopter carter dari Bandara Halim Perdanakusuma ke Helipad WRO-GBR.',
                'room_id' => $createdRooms[2]->id,
            ],
            [
                'name' => 'Amelia Laksmono, B.Arch',
                'email' => 'amelia.laksmono@archstudio.id',
                'phone' => '+62 818 7766 5544',
                'inquiry_type' => 'Reservasi Kamar',
                'is_vip' => true,
                'guest_count' => 2,
                'message' => 'Reservasi romantic anniversary di Grand Executive Suite dengan paket Romantic / Honeymoon setup, Lotus Spa 90-minute treatment, dan romantic deck 5-course candle light dinner.',
                'room_id' => $createdRooms[1]->id,
            ],
            [
                'name' => 'Direksi PT Bank Mandiri (Persero) Tbk',
                'email' => 'corporate.sec@bankmandiri.co.id',
                'phone' => '+62 811 5566 7788',
                'inquiry_type' => 'MICE / Korporat Gathering',
                'is_vip' => true,
                'guest_count' => 45,
                'message' => 'Permintaan blok reservasi 15 unit suite dan aula rapat eksklusif untuk acara Strategic BOD & BOC Meeting kuartal 4.',
                'room_id' => $createdRooms[4]->id,
            ],
        ];

        foreach ($vipInquiries as $idx => $inq) {
            Inquiry::create(array_merge($inq, [
                'inquiry_code' => sprintf('INQ-VIP-2026-%03d', $idx + 1),
                'check_in_date' => now()->addDays(5 + $idx * 3),
                'check_out_date' => now()->addDays(7 + $idx * 3),
                'special_requests' => ['VIP Shuttle / Pick-up', 'Diet Halal / Vegan Chef', 'Early Check-in Priority'],
                'status' => 'baru',
                'response_time_minutes' => 12,
            ]));
        }

        // 14 regular inquiries (to reach total 19 "Baru / Perlu Tindakan")
        $regularNames = [
            'Dian Sastrowardoyo', 'Nicholas Saputra', 'Hendra Gunawan', 'Farah Quinn', 'Budi Hartono',
            'Siti Rahmawati', 'Denny Sumargo', 'Najwa Shihab', 'Indra Priawan', 'Maudy Ayunda',
            'Reza Rahadian', 'Prisia Nasution', 'Adinia Wirasti', 'Chicco Jerikho'
        ];

        foreach ($regularNames as $idx => $name) {
            $room = $createdRooms[$idx % 5];
            Inquiry::create([
                'inquiry_code' => sprintf('INQ-2026-%03d', $idx + 6),
                'room_id' => $room->id,
                'name' => $name,
                'email' => strtolower(str_replace(' ', '.', $name)) . '@example.com',
                'phone' => sprintf('+62 812 %04d %04d', rand(1000, 9999), rand(1000, 9999)),
                'inquiry_type' => ($idx % 3 === 0) ? 'Wedding & Acara' : (($idx % 2 === 0) ? 'Lotus Spa & Wellness' : 'Reservasi Kamar'),
                'is_vip' => false,
                'check_in_date' => now()->addDays(rand(2, 20)),
                'check_out_date' => now()->addDays(rand(21, 25)),
                'guest_count' => rand(2, 4),
                'special_requests' => ['Extra Bed Setup', 'Romantic / Honeymoon'],
                'message' => "Mohon informasi ketersediaan kamar {$room->name} untuk akhir pekan beserta opsi paket makan malam santap botani.",
                'status' => 'baru',
                'response_time_minutes' => rand(8, 20),
            ]);
        }

        // 6. Seed Reservations
        $reservationsData = [
            [
                'room' => $createdRooms[1], // ES-304
                'guest_name' => 'Amelia Laksmono, B.Arch',
                'guest_email' => 'amelia.laksmono@archstudio.id',
                'guest_phone' => '+62 818 7766 5544',
                'id_type' => 'KTP',
                'check_in' => now()->subDay(),
                'check_out' => now()->addDays(2),
                'nights' => 3,
                'adults' => 2,
                'children' => 0,
                'requests' => ['Romantic / Honeymoon', 'VIP Shuttle / Pick-up'],
                'notes' => 'Anniversary setup dengan penataan bunga mawar merah di kamar mandi marmer dan free botanical high-tea sore.',
                'payment' => 'paid',
                'status' => 'checked_in',
            ],
            [
                'room' => $createdRooms[4], // RF-501
                'guest_name' => 'Bambang Wicaksono',
                'guest_email' => 'bambang.w@jakartatech.vc',
                'guest_phone' => '+62 811 9876 5432',
                'id_type' => 'KTP',
                'check_in' => now()->subDays(2),
                'check_out' => now()->addDay(), // Checkout besok
                'nights' => 3,
                'adults' => 4,
                'children' => 1,
                'requests' => ['Early Check-in Priority', 'Diet Halal / Vegan Chef'],
                'notes' => 'Permintaan kamar di lantai atas dengan pantry lengkap dan bebas asap rokok.',
                'payment' => 'paid',
                'status' => 'checked_in',
            ],
            [
                'room' => $createdRooms[0], // DF-102
                'guest_name' => 'Raden Arya Wicaksana',
                'guest_email' => 'raden.arya@domain.com',
                'guest_phone' => '+62 812 3456 7890',
                'id_type' => 'KTP',
                'check_in' => now()->addDays(3),
                'check_out' => now()->addDays(5),
                'nights' => 2,
                'adults' => 2,
                'children' => 0,
                'requests' => ['VIP Shuttle / Pick-up', 'Extra Bed Setup'],
                'notes' => 'Mohon penjemputan dari Stasiun Bogor pukul 13:00 WIB.',
                'payment' => 'paid',
                'status' => 'confirmed',
            ],
            [
                'room' => $createdRooms[3], // JG-211
                'guest_name' => 'Siti Nurhaliza & Rekan',
                'guest_email' => 'siti.nurhaliza@resort.id',
                'guest_phone' => '+62 813 5544 3322',
                'id_type' => 'KTP',
                'check_in' => now()->addDays(7),
                'check_out' => now()->addDays(9),
                'nights' => 2,
                'adults' => 2,
                'children' => 1,
                'requests' => ['Baby Cot / Crib', 'Diet Halal / Vegan Chef'],
                'notes' => 'Keluarga dengan bayi 8 bulan, butuh boks bayi steril dan menu MPASI tanpa garam.',
                'payment' => 'pending',
                'status' => 'pending',
            ],
        ];

        foreach ($reservationsData as $idx => $res) {
            $room = $res['room'];
            $totalAmount = $room->price_per_night * $res['nights'];
            Reservation::create([
                'reservation_code' => sprintf('GBR-%s-%04d', now()->format('Ym'), $idx + 101),
                'room_id' => $room->id,
                'guest_name' => $res['guest_name'],
                'guest_email' => $res['guest_email'],
                'guest_phone' => $res['guest_phone'],
                'id_type' => $res['id_type'],
                'check_in_date' => $res['check_in'],
                'check_out_date' => $res['check_out'],
                'total_nights' => $res['nights'],
                'total_adults' => $res['adults'],
                'total_children' => $res['children'],
                'special_requests' => $res['requests'],
                'notes' => $res['notes'],
                'total_amount' => $totalAmount,
                'payment_status' => $res['payment'],
                'reservation_status' => $res['status'],
            ]);
        }

        // 7. Seed Housekeeping Logs (42 Higienis Steril, 6 Sedang Pembersihan)
        foreach ($createdRooms as $idx => $room) {
            $status = ($idx < 42) ? 'higienis_steril' : 'sedang_pembersihan';
            $note = ($idx < 42)
                ? 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).'
                : 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.';

            HousekeepingLog::create([
                'room_id' => $room->id,
                'user_id' => $admin->id,
                'cleanliness_status' => $status,
                'inspected_at' => now()->subMinutes(rand(10, 180)),
                'notes' => $note,
            ]);
        }

        // 8. Seed Categories & Posts (Authentic Grand Bogor News & Articles)
        $catBotani = Category::create([
            'name' => 'Botani & Konservasi',
            'description' => 'Kisah pelestarian cagar hayati, 340+ spesies flora langka, dan hutan pinus dataran tinggi Cisarua.',
        ]);

        $catSpa = Category::create([
            'name' => 'Relaksasi & Kebugaran',
            'description' => 'Pengalaman terapi tradisional Sunda Kuno di Lotus Spa Riverside dan sesi Sunrise Yoga.',
        ]);

        $catKuliner = Category::create([
            'name' => 'Gastronomi Pasundan',
            'description' => 'Sajian farm-to-table berbahan organik lokal di Restoran Bumi Parahyangan.',
        ]);

        $catFasilitas = Category::create([
            'name' => 'Fasilitas & Rekreasi',
            'description' => 'Pembaruan fasilitas Salak Heated Pool, helipad sanctuary, dan event akbar Grand Ballroom.',
        ]);

        Post::create([
            'category_id' => $catBotani->id,
            'image' => 'posts/botani.jpg',
            'title' => 'Pesona Kebun Botani 12 Hektar: Menemukan Ketenangan Jiwa di Tengah Ratusan Pinus Merkusii',
            'content' => '<p>Grand Bogor Resort & Botanical Sanctuary bukan sekadar tempat menginap, melainkan suaka konservasi yang telah dirawat sejak 1998 di lereng bukit Cisarua. Dengan lebih dari 340 spesies flora tropis langka dan ribuan pohon pinus merkusii, setiap hembusan udara membawa aroma kesegaran alami yang meremajakan paru-paru.</p><p>Para tamu dapat menjelajahi jalur setapak batu andesit sepanjang 1,8 km sembari menikmati gemericik aliran sungai pegunungan alami. Suasana hening dan asri ini dirancang khusus untuk menyelaraskan kembali ritme jiwa di tengah pesona alam Parahyangan.</p>',
        ]);

        Post::create([
            'category_id' => $catSpa->id,
            'image' => 'posts/spa.jpg',
            'title' => 'Lotus Spa & Wellness Ritual: Sentuhan Terapi Warisan Sunda Kuno di Tepi Sungai Alami',
            'content' => '<p>Rasakan kedamaian hakiki melalui Lotus Spa Paviliun Riverside. Terapi relaksasi kami memadukan racikan minyak asiri cengkih, serai wangi, serta lulur beras merah organik hasil panen lokal tanah Pasundan.</p><p>Dipandu oleh terapis bersertifikasi internasional (CIBTAC & CHSE), setiap sesi perawatan 90 menit diiringi gemericik riak air sungai alami Cisarua di paviliun semi-terbuka bernuansa bambu artistik. Memulihkan vitalitas tubuh dan ketenangan batin seutuhnya.</p>',
        ]);

        Post::create([
            'category_id' => $catKuliner->id,
            'image' => 'posts/kuliner.jpg',
            'title' => 'Cita Rasa Adiboga Pasundan: Sensasi Nasi Liwet Sunda Istimewa Bumi Parahyangan',
            'content' => '<p>Bumi Parahyangan Restaurant menyajikan harmoni kuliner warisan priangan berpadu teknik gastronomi kontemporer. Di bawah arahan Executive Chef Junaidi Hartono, setiap hidangan diolah dari bahan-bahan organik segar yang dipetik saat fajar dari kebun hidroponik resor.</p><p>Menu andalan kami, Nasi Liwet Sunda Istimewa, dimasak perlahan dalam kuali tembikar tradisional dengan paduan rempah pusaka, disajikan bersama lalapan segar dan sambal terasi bakar autentik yang menggugah selera.</p>',
        ]);

        Post::create([
            'category_id' => $catFasilitas->id,
            'image' => 'posts/pool.jpg',
            'title' => 'Sensasi Berenang di Salak Heated Pool: Panorama 180 Derajat Menatap Kemegahan Gunung Salak',
            'content' => '<p>Nikmati kenyamanan berenang di Salak Heated Pool dengan suhu air termal hangat yang terkontrol konstan pada 34°C. Berada di tepi tebing resor, kolam infinity ini menawarkan pemandangan spektakuler 180 derajat ke arah lembah berkabut dan siluet megah Gunung Salak saat senja.</p><p>Air kolam dipasok langsung dari mata air purba pegunungan yang melalui sistem pemurnian ultrafiltrasi ganda, lembut di kulit tanpa aroma kaporit yang menyengat.</p>',
        ]);
    }
}
