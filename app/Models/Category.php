<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Pastikan model Product di-import jika berada di namespace yang sama, 
// biasanya otomatis terbaca, tapi bisa ditambahkan use App\Models\Product; untuk amannya.

class Category extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal
    protected $fillable = ['name'];

    // --- TAMBAHKAN KODE INI ---
    // Relasi One-to-Many: Satu kategori memiliki banyak produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}