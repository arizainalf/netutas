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
                'nama' => 'Ari Zainal Fauziah',
                'email' => 'arizainalf@gmail.com',
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
                'no_telepon' => '0896 1234 5678',
                'email' => 'smpn7tasikmalaya@gmail.com',
                'ig' => 'smpn7_tasikmalaya',
                'youtube' => '@smpn7tasikmalaya',
                'facebook' => '@smpn7tasikmalaya',
                'twitter' => '@smpn7tasikmalaya',
                'sambutan_kepsek' => 'Assalamu’alaikum Warohmatullohi Wabarokatuh Puji syukur kita panjatkan kehadirat Allah SWT yang telah memberikan karunia hidayah dan taufik-Nya serta kesehatan sehingga kita masih mampu beraktivitas dengan nyaman sampai hari ini. Shalawat teriring salam kita sanjungkan kepada junjungan kita Nabi Muhammad SAW beserta keluarganya, para sahabatnya dan umatnya sampai akhir zaman. Pendidikan adalah aset terbesar yang berperan dalam membangun negara yang tinggi peradabannya, karena dengan pendidikanlah SDM yang mengisi pembangunan negara ini mampu menjaga persatuan dan kesatuan, keutuhan dan kelestarian lingkungan hidupnya. Dalam rangka ikut berperan dalam bidang pendidikan, SMP Negeri 7 Tasikmalaya, menyiapkan program pendidikan yang berkualitas dengan lingkungan yang sehat, asri dan nyaman serta didukung oleh tenaga pendidik yang professional serta sarana yang memadai akan menghasilkan lulusan yang Cerdas, Disiplin, Inovatif, dan Kompetitif . Penanaman karakter pada siswa merupakan hal terpenting dalam proses pembelajaran di sekolah kami, yaitu Religius, Jujur, Adil, Berpikir Kritis, Bekerja Keras, Peduli, Bertanggung Jawab, Komunikatif dan Literat. Berikut ini profile sekolah kami, selamat menikmati dan kami tunggu kedatangan Bapak dan Ibu di SMP Negeri & Tasikmalaya. Wabillahi taufik wal hidayah wassalamu’alaikum Warohmatullohi Wabarokatuh',
                'visi' => 'Menciptakan Insan Yang Taqwa, Cerdas, Berbudaya, Dan Berwawasan Lingkungan.',
                'logo_sekolah' => 'logo_sekolah.png',
            ],
            ];

        DB::table('profiles')->insert($profilesData);

        $beritasData = [
            [
                'judul' => 'Lorem Ipsum',
                'gambar' => 'berita.img',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, natus.',
                'slug' => 'lorem-ipsum-dolor-sit-amet-consectetur',
                'published_at' => '2022-01-01 00:00:00',
                'user_id' => '1',
            ],
            [
                'judul' => 'berita kedua','gambar' => 'UHnTlr53W7WM7czXJs9uUKJkxkb4ZsRgppS5aLU5.png','deskripsi' => 'berita kedua','slug' => 'berita-kedua','published_at' => '2024-05-30','user_id' => '1',
            ]
    ];

        DB::table('beritas')->insert($beritasData);

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
        'nama' => 'Wakil Kepala Sekolah',
    ]
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
                'nama' => 'Juara 3 Lomba OSN','tingkat' => 'Kota','deskripsi' => 'Kejuaraan Lomba OSN','image' => 'eAjOxs19uAkCM8fkDJ1fEw7pqULtZ35Z4VYAvXfQ.jpg','peraih' => 'Ari Zainal Fauziah',
            ]
            ];
            DB::table('prestasis')->insert($prestasiData);

        }
}