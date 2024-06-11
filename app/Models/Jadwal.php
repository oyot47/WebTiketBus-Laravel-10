<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jadwal) {
            $jadwal->status = 1; // Set nilai default saat membuat data baru
        });
    }

    protected $fillable = [
        'id',
        'kota_asal_id',
        'kota_tujuan_id',
        'terminal_asal_id',
        'terminal_tujuan_id',
        'tanggal_keberangkatan',
        'tanggal_sampai',
        'jam_keberangkatan',
        'jam_sampai',
        'destinasi_waktu',
        'bus_id',
        'jumlah_tiket_tersedia',
        'harga_tiket',
        'status'
    ];

    public function kotaAsal()
    {
        return $this->belongsTo(Kota::class, 'kota_asal_id');
    }

    public function kotaTujuan()
    {
        return $this->belongsTo(Kota::class, 'kota_tujuan_id');
    }

    public function terminalAsal()
    {
        return $this->belongsTo(Terminal::class, 'terminal_asal_id');
    }

    public function terminalTujuan()
    {
        return $this->belongsTo(Terminal::class, 'terminal_tujuan_id');
    }

    public function bus()
{
    return $this->belongsTo(Bus::class);
}
}
