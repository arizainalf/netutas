<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;



class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('beritas')->insert([
                'judul' => $faker->sentence,
                'gambar' => 'berita.jpg',
                'deskripsi' => $faker->paragraph,
                'slug' => $faker->slug,
                'published_at' => $faker->date,
                'user_id' => 1, // Ganti dengan ID user yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}