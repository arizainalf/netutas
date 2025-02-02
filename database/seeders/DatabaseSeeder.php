<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $usersData = [
            [
                'nama' => 'Tedi ardian',
                'email' => 'tedi@gmail.com',
                'password' => bcrypt('11221122'),
                'role' => 'Admin',
                'image' => 'user.png',
            ],
        ];

        DB::table('users')->insert($usersData);

        $profilesData = [
            [
                'nama_sekolah' => 'SMPN 7 TASIKMALAYA',
                'alamat_sekolah' => 'Jl. Letnan Dadi Suyatman No. 76, Sukamanah, Kec. Cipedes, Kota Tasikmalaya Prov. Jawa Barat',
                'no_telepon' => '-',
                'email' => 'smpn7tasikmalaya@gmail.com',
                'ig' => 'smpn7_tasikmalaya',
                'sambutan_kepsek' => 'Assalamu’alaikum Warohmatullohi Wabarokatuh Puji syukur kita panjatkan kehadirat Allah SWT yang telah memberikan karunia hidayah dan taufik-Nya serta kesehatan sehingga kita masih mampu beraktivitas dengan nyaman sampai hari ini. Shalawat teriring salam kita sanjungkan kepada junjungan kita Nabi Muhammad SAW beserta keluarganya, para sahabatnya dan umatnya sampai akhir zaman. Pendidikan adalah aset terbesar yang berperan dalam membangun negara yang tinggi peradabannya, karena dengan pendidikanlah SDM yang mengisi pembangunan negara ini mampu menjaga persatuan dan kesatuan, keutuhan dan kelestarian lingkungan hidupnya. Dalam rangka ikut berperan dalam bidang pendidikan, SMP Negeri 7 Tasikmalaya, menyiapkan program pendidikan yang berkualitas dengan lingkungan yang sehat, asri dan nyaman serta didukung oleh tenaga pendidik yang professional serta sarana yang memadai akan menghasilkan lulusan yang Cerdas, Disiplin, Inovatif, dan Kompetitif . Penanaman karakter pada siswa merupakan hal terpenting dalam proses pembelajaran di sekolah kami, yaitu Religius, Jujur, Adil, Berpikir Kritis, Bekerja Keras, Peduli, Bertanggung Jawab, Komunikatif dan Literat. Berikut ini profile sekolah kami, selamat menikmati dan kami tunggu kedatangan Bapak dan Ibu di SMP Negeri & Tasikmalaya. Wabillahi taufik wal hidayah wassalamu’alaikum Warohmatullohi Wabarokatuh',
                'visi' => 'Menciptakan Insan Yang Taqwa, Cerdas, Berbudaya, Dan Berwawasan Lingkungan.',
                'logo_sekolah' => 'logo_sekolah.png',
            ],
            ];

        DB::table('profiles')->insert($profilesData);

        $ekstrakurikulerData = [
            [
                'nama' => 'Pramuka',
            ]
            ];

            DB::table('ekstrakurikulers')->insert($ekstrakurikulerData);

        $jabatansData = [
            [
                'nama' => 'Kepala Sekolah',
            ],
            [
                'nama' => 'Wakasek Kesiswaan',
            ],
            [
                'nama' => 'Wakasek Humas',
            ],
            [
                'nama' => 'Wakasek Kurikulum',
            ],
            [
                'nama' => 'Wakasek Sarana Prasarana',
            ],
            [
                'nama' => 'Guru',
            ],
            [
                'nama' => 'Staff TU',
            ],
            ];

            DB::table('jabatans')->insert($jabatansData);

        $mapelsData = [
            [
                'nama' => 'Matematika',
            ],
            [
                'nama' => 'IPA',
            ],
            [
                'nama' => 'Bahasa Sunda',
            ],
            [
                'nama' => 'Bahasa Indonesia',
            ],
            [
                'nama' => 'IPS',
            ],
            [
                'nama' => 'Penjas',
            ],
            [
                'nama' => 'Seni Budaya',
            ],
            [
                'nama' => 'PKN',
            ],
            [
                'nama' => 'Bahasa Inggris',
            ],
            [
                'nama' => 'TIK',
            ],
            [
                'nama' => 'BK',
            ],

        ];
        DB::table('mapels')->insert($mapelsData);

        $staffGuruData = [
            [
                'nama' => 'Ade Mohammad Supriyadi',
                'id_jabatan' => '1',
                'id_mapel' => '2',
            ]
            ];

            DB::table('staff_gurus')->insert($staffGuruData);

        $misiData = [
            [
                'misi' => 'Menciptakan Sumber Daya Manusia (SDM) yang berakhlak karimah.',
            ],
            [
                'misi' => 'Mengembangkan Seluruh Potensi Siswa Secara Optimal Baik Dalam Bidang Akademik maupun Non Akademik.',
            ],
            [
                'misi' => 'Meningkatkan Mutu Pendidikan Yang Mengintegrasikan Sistem Nilai Agama.',
            ],
            [
                'misi' => 'Budaya Terhadap Kemajuan IPTEK.',
            ],
            [
                'misi' => 'Mengoptimalkan Sumber Daya, Dana dan Sarana Prasarana Yang Ada Di Sekolah dan Mensinergikan Dengan Seluruh Potensi Guna Mewujudkan Visi Sekolah Secara Optimal.',
            ],
            [
                'misi' => 'Menjalin Kerja Sama Yang Baik Antara Sekolah Dengan Wali Peserta Didik.',
            ],
            [
                'misi' => 'Masyarakat, Instansi Dan Lembaga Terkait Secara Harmonis.',
            ],
            [
                'misi' => 'Menciptakan Lingkungan Sekolah Yang Asri, Rindang dan Nyaman.',
            ],
        ];

        DB::table('misis')->insert($misiData);


        $prestasiData = [
            [
                'nama' => 'Juara 1 Lomba Puisi',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Lomba Festival Literasi Numerasi KM7',
                'image' => 'p1rTTw6b27rzJQONhEQipwHfrUA07gJRCcw3QexS.png',
                'peraih' => 'Indri Apriliani',
            ],
            [
                'nama' => 'Juara 2 Lomba Puisi',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'Fj0cpEntXOZz9AajGgCyas4Jlo4CAtJs20h3T9R5.png',
                'peraih' => 'Amallia Agustina',
            ],
            [
                'nama' => 'Juara 1 Poster',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'S7sk3n1RfUkQVwNuXbSmHM0q6d74LrcxszqmIv8M.png',
                'peraih' => 'Martha Mulia',
            ],
            [
                'nama' => 'Juara 1 Futsal Perempuan',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'i0eUKBofFhUtt5UJlG76ImLyDuV8gsvRUe9LpzMO.png',
                'peraih' => 'Kelas 7D',
            ],
            [
                'nama' => 'Juara 2 Poster',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'LQs6zSBrbyV6z9mESwNyJdlJBYnPYbaLn35DasKk.png',
                'peraih' => 'Melisa Ariyanti',
            ],
            [
                'nama' => 'Juara 3 Poster',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'V9JYyD0ypbXnOBqh6AqyvjClDqf5blpzxf9TeJXo.png',
                'peraih' => 'Tinta Mulyani',
            ],
            [
                'nama' => 'Juara 1 Bola Madun',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi',
                'image' => 'hfXmbl14ZxtVwxYllQELEuhGPq157hUG0oJv2lnt.png',
                'peraih' => 'Rizky Nurisman, M. Rafi AlFarizi',
            ],
            [
                'nama' => 'Juara 2 Bola Madun',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'uChvbmhM5vx1DjtwyaiqA9tgInkiZLIVRwkhMpn8.png',
                'peraih' => 'Pajar Nur Alin Robika, Nizar Chandra Febryansyah',
            ],
            [
                'nama' => 'Juara 1 Futsal',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'G0Du9C0zundd1ygaPh8OTZoSiCGbbTZGpx5gSOwZ.png',
                'peraih' => 'Kelas 8C Putra',
            ],
            [
                'nama' => 'Juara 3 Futsal',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi',
                'image' => 'k9UKMES0Xg1YM8x5uKMudDX9D1CmJ0BMvWZ1zRbw.png',
                'peraih' => 'Kelas 8D',
            ],
            [
                'nama' => 'Juara 2 Futsal',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi',
                'image' => 'o2PpRWY08v3g6FA8CEyjat1yXd3OgQw3E9KqkjeP.png',
                'peraih' => 'Kelas 7C',
            ],
            [
                'nama' => 'Juara 3 Puisi',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi',
                'image' => 'BtH4mwcyHnvzEagtvtHEQvkfy1j0BGntmkjBqGCn.png',
                'peraih' => 'Medina Bunga Larasati',
            ],
            [
                'nama' => 'Juara 1 Lomba Ranking 1',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'W6DsiRDQt0EF0Lxg5GIGs2hoVKQP7aje7JTjZugE.png',
                'peraih' => 'Tiara Salsabila',
            ],
            [
                'nama' => 'Juara Bazar Terbaik',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi KM7',
                'image' => 'enF6p73UZqfCawWICtwOWhdGeMAcYfa0t1qbMUFL.png',
                'peraih' => 'Kelas 8C',
            ],
            [
                'nama' => 'Juara Stand Bazar Favorit',
                'tingkat' => 'Sekolah',
                'deskripsi' => 'Festival Literasi Numerasi',
                'image' => 'IyPmGzIw1h7GjbX4EC95A3sneFfMy8hiD4DfR4wH.png',
                'peraih' => 'Kelas 8A',
            ],
        ];

        DB::table('prestasis')->insert($prestasiData);


        }
}
