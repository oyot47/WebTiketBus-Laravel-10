<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran'; 

    protected $fillable = [
        'user_id', // Menambahkan user_id ke dalam fillable property
        'e_ticket_id',
        'jadwal_id',
        'metode_pembayaran',
        'jumlah',
        'bukti_transfer',
        'status',
    ];

    // Relasi Many-to-One dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi Many-to-One dengan model Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'user_id', 'user_id')
                    ->where('jadwal_id', $this->jadwal_id);
    }

    
}
