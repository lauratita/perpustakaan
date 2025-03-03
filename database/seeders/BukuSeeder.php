<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // menambah data buku secara manual
        DB::table("bukus")->insert([
            [
                'judul' => 'Laravel untuk Pemula',
                'pengarang' => 'John Doe',
                'tgl_pembelian' => '2024-01-01',
                'jumlah' => 10,
                'status' => 'tersedia',
            ],
            [
                'judul' => 'Mastering PHP',
                'pengarang' => 'Jane Doe',
                'tgl_pembelian' => '2024-02-01',
                'jumlah' => 5,
                'status' => 'tidak tersedia',
            ]
        ]);

        // menambahkan 10 data buku secara random dengan Factory
        Buku::factory(3)->create();
    }
}