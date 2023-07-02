<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;

    protected $table = 'pengambilan';
    protected $primaryKey = 'id_pengambilan';
    protected $guarded = ['id_pengambilan'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function suratjalan()
    {
        return $this->hasOne(Suratjalan::class, 'id_pengambilan', 'id_pengambilan');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }

}
