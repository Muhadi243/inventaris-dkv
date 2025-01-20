<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    //
    Protected $table= 'jenis_barang';
    protected $fillable = [
        'nama_jenis_barang',
    ];
}
