<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    // nama tabel dalam database (jika tidak sesuai dengan konvensi laravel)

    protected $fillable = ['nama', 'harga', 'stok'];
    // mass assignment protection

    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }

}