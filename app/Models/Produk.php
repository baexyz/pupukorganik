<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $guarded = ['id_produk'];


    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_keranjang');
    }

}
