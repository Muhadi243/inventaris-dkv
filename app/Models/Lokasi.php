<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    //
    Protected $table= 'lokasi';
    protected $fillable = [
        'nama_lokasi',
    ];
}
