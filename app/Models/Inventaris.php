<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    //
    Protected $table= 'inventaris';
    protected $fillable = [
        'id_barang',
        'id_lokasi',
        'jumlah_barang',
        'kondisi_barang',
        'ket_barang',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_lokasi');
    }
}
