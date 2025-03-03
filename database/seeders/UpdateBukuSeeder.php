<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class UpdateBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // update dengan id
        Buku::where('id', 1)->update([
            'judul' => 'Laravel Lanjutan',
            'pengarang' => 'John Doe Updated',
            'jumlah' => 15,
            'status' => 'tersedia',
        ]);

        // update dengan status
        Buku::where('status', 'tidak tersedia')->update([
            'status' => 'tersedia'
        ]);

        // update data pertama
        $buku = Buku::first(); // Ambil buku pertama
        if ($buku) {
            $buku->judul = 'Updated: ' . $buku->judul;
            $buku->save();
        }
    }
}
