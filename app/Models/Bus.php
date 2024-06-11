<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'bus';

    protected $fillable = [
        'nama',
        'image',
        'nomor_plat',
        'jenis',
        'jumlah_kursi',
        'format_kursi',
        'fasilitas',
        'keterangan',
    ];

}
