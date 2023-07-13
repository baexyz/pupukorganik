<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = ['id_pembayaran'];



    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id_user');
    // }

    public function checkout()
    {
        return $this->belongsTo(Keranjang::class, 'id_pemesanan', 'id_keranjang');
    }

    public function pengambilan()
    {
        return $this->hasOne(Pengambilan::class, 'id_pembayaran', 'id_pembayaran');
    }

    
}
