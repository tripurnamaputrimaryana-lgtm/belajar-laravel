<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Hobi;

class HobiSeeder extends Seeder
{
    public function run()
    {
        // Buat beberapa hobi
        $hobi1 = Hobi::create(['nama_hobi' => 'Membaca Buku']);
        $hobi2 = Hobi::create(['nama_hobi' => 'Bermain Bola']);
        $hobi3 = Hobi::create(['nama_hobi' => 'Bernyanyi']);
        $hobi4 = Hobi::create(['nama_hobi' => 'Coding']);

        // Ambil semua mahasiswa
        $mahasiswas = Mahasiswa::all();

        // Assign hobi ke setiap mahasiswa (random)
        foreach ($mahasiswas as $mhs) {
            $randomHobi = [$hobi1->id, $hobi2->id, $hobi3->id, $hobi4->id];
            shuffle($randomHobi);
            $mhs->hobis()->attach(array_slice($randomHobi, 0, rand(1, 3)));
        }
    }
}