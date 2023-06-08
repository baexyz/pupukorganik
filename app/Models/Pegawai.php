<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $guarded = ['id_pegawai'];
    
    protected $hidden = ['password_pegawai'];


    public function suratjalan()
    {
        return $this->hasMany(Suratjalan::class, 'id_suratjalan');
    }
      

}
