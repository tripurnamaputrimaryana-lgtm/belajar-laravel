<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukStok extends Model
{
    protected $fillable = ['nama_produk', 'harga', 'stok'];
}
