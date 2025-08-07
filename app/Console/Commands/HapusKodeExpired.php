<?php

namespace App\Console\Commands;

use App\Models\KodeAbsensi;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HapusKodeExpired extends Command
{
   protected $signature = 'hapus:kode-expired';
    protected $description = 'Menghapus kode absensi yang sudah expired';

    public function handle()
    {
        $jumlah = KodeAbsensi::where('expired_at', '<', Carbon::now())->delete();

        $this->info("Berhasil menghapus {$jumlah} kode absensi yang sudah expired.");
    }
}
