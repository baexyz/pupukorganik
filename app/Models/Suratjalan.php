<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratjalan extends Model
{
    use HasFactory;

    protected $table = 'suratjalan';
    protected $primaryKey = 'id_suratjalan';
    protected $guarded = ['id_suratjalan'];


    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }


    public function pengambilan()
    {
        return $this->belongsTo(Pengambilan::class, 'id_pengambilan');
    }


}
