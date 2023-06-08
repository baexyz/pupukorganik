<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];

    protected $hidden = ['password_user'];




    public function keranjang()
    {
        return $this->hasOne(Keranjang::class, 'id_keranjang');
    }

    public function checkout()
    {
        return $this->hasMany(Checkout::class, 'id_checkout');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran');
    }

    public function pengambilan()
    {
        return $this->hasMany(Pengambilan::class, 'id_pengambilan');
    }

}
