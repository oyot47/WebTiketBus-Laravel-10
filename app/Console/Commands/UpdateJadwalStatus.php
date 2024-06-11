<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Jadwal;
use Carbon\Carbon;

class UpdateJadwalStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jadwal:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of jadwal based on departure time';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();

        // Ambil semua jadwal yang masih aktif
        $jadwals = Jadwal::where('status', true)->get();

        foreach ($jadwals as $jadwal) {
            // Ubah format tanggal dan jam keberangkatan ke dalam format Carbon
            $tanggalKeberangkatan = Carbon::createFromFormat('Y-m-d H:i:s', $jadwal->tanggal_keberangkatan . ' ' . $jadwal->jam_keberangkatan);

            // Periksa apakah tanggal dan jam keberangkatan sudah lewat
            if ($now > $tanggalKeberangkatan) {
                // Jika sudah lewat, ubah status jadwal menjadi nonaktif (0)
                $jadwal->status = 0;
                $jadwal->save();
            }
        }

        $this->info('Jadwal status updated successfully.');
    }
}
