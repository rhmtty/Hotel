<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AktivitasKaryawan extends Model
{
    protected $table = 'aktivitas_karyawan';

    public function scopeDataLaporan($query, $key)
    {
        $tgl = Carbon::parse($key);
        $tgl_end = Carbon::parse($key)->addWeeks(4)->addDays(2);

        return $query->where('created_at', $tgl)
            ->where('created_at', $tgl_end)
            ->select('aktivitas_karyawan.id', 'aktivitas_karyawan.nama_karyawan', 'aktivitas_karyawan.info_karyawan', 'aktivitas_karyawan.aktivitas', 'aktivitas_karyawan.created_at')
            ->get();
    }
}
