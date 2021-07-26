<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporan extends Model
{
    protected $tabel = "bookings";

    public function scopeLaporanBooking($query){
        return $query->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            // ->where('bookings.active', 1)
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.nama as nama_pelanggan', 'pelanggan.telp as telp_pelanggan', 'pelanggan.alamat as alamat_pelanggan', [DB::raw("DATE_FORMAT(created_at, '%Y-%m') date_report"),DB::raw('YEAR(updated_at) year, MONTH(created_at) month')])
            ->orderby('date_report', 'desc')
            ->get();
    }
}
