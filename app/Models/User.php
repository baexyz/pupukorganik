<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];

    protected $hidden = ['password_user'];

    public function getAuthPassword()
    {
        return $this->password_user;
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_user', 'id_user');
    }

    // public function checkout()
    // {
    //     return $this->hasMany(Checkout::class, 'id_checkout');
    // }

    // public function pembayaran()
    // {
    //     return $this->hasMany(Pembayaran::class, 'id_user', 'id_user');
    // }

    public function pengambilan()
    {
        return $this->hasMany(Pengambilan::class, 'id_user', 'id_user');
    }

}
