<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $guarded = ['id_keranjang'];



    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }

    
}
