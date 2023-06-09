<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $guarded = [''];
    protected $keyType = 'string';



    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function checkout()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan', 'id_keranjang');
    }

    
}
