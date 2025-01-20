<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    //
    Protected $table= 'pembelian';
    protected $fillable = [
        'tgl_pembelian',
        'nama_toko',
        'keterangan_anggaran',
        'nota_pembelian',
    ];
}
