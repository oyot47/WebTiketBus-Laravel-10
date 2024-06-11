<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'user_id',
        'jadwal_id',
        'titel',
        'nama',
        'harga_tiket',
        'tanggal_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function transaksi()
{
    return $this->belongsTo(Transaksi::class, 'id_user', 'user_id')->where('jadwal_id', $this->jadwal_id);
}

    public function pembayaranview($user_id, $jadwal_id)
{
    $namaPenumpang = $this->getPesananByUserIdAndJadwalId($user_id, $jadwal_id);

    return view('pembayaran', ['namaPenumpang' => $namaPenumpang]);
}
}
