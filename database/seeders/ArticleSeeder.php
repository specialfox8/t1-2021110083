<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 25; $i++) {
            $id = $faker->sentence(13);
            $judul = $faker->sentence(6);
            $halaman = $faker->sentence();
            $kategori = $faker->sentence('uncategorized');
            $penerbit = $faker->numberBetween(0, 10000000);
            $creared_at = $faker->dateTimeBetween('-9 months');

            DB::table('articles')->insert([
                'id' => $id,
                'judul' => $judul,
                'halaman' => $halaman,
                'kategori' => $kategori,
                'penerbit' => $penerbit,
                'published_at' => $creared_at,
                'created_at' => $creared_at,
                'updated_at' => $creared_at
            ]);
        }
    }
}
