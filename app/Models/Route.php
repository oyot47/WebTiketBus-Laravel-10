<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $table = 'routes';
    protected $fillable = [
        'terminal_asal_id',
        'terminal_tujuan_id',
        'waktu_destinasi',
    ];

    public function terminalAsal()
    {
        return $this->belongsTo(Terminal::class, 'terminal_asal_id');
    }

    public function terminalTujuan()
    {
        return $this->belongsTo(Terminal::class, 'terminal_tujuan_id');
    }
}
