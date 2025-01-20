<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    Protected $table= 'barang';
    protected $fillable = [
        'nama_barang',
        'id_jenis_barang',
        'stok_barang',
        'token_qr',
        'id_lokasi',
        'merek',
        'kode_barang',
    ];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}
