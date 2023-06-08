<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'id_produk';
    protected $primaryKey = 'id_produk';
    protected $guarded = ['id_produk'];


    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_keranjang');
    }

}
