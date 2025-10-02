<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        DB::table('posts')->delete();
        $post = [
            [
                'judul'               => 'Laut Bercerita',
                'harga'               => 100000,
                'stok'                => 12,
                'tahun_diterbitkan'   =>2017,
            ],
            [
                'judul'             => 'Dilan 1990',
                'harga'             => 100000,
                'stok'              => 20,
                'tahun_diterbitkan' => 2014,
            ],
            [
                'judul'             => 'Elgara',
                'harga'             => 100000,
                'stok'              => 10,
                'tahun_diterbitkan' => 2021,
            ],
            [
                'judul'             => 'Malioboro',
                'harga'             => 100000,
                'stok'              => 32,
                'tahun_diterbitkan' => 2023,
            ],
            [
                'judul'             => 'Rumah Untuk Alie',
                'harga'             => 100000,
                'stok'              => 22,
                'tahun_diterbitkan' => 2024,
            ], 
        ];
        DB::table('buku')->insert($post);
    }
}
