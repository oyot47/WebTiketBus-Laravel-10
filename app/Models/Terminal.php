<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $table = 'terminal';

    protected $fillable = ['nama', 'kota_id','address','maps_link'];

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id'); // 'kota_id' adalah nama kolom yang berisi ID kota di tabel terminal
    }
}
