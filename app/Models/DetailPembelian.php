<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    //
    Protected $table= 'detail_pembelian';
    protected $fillable = [
        'id_pembelian',
        'id_barang',
        'jumlah_barang',
        'subtotal_pembelian',
        'harga_perbarang',
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_pembelian');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
