<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function scopeDataBooking($query)
    {
        return $query->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            // ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar',  'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.customer_name as nama_pelanggan', 'pelanggan.customer_phone as telp_pelanggan', 'pelanggan.customer_address as alamat_pelanggan')
            ->paginate(10);
    }

    public function scopeEditBooking($query, $id)
    {
        return $query->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            ->where('bookings.id', $id)
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.customer_name as nama_pelanggan', 'pelanggan.customer_email as email', 'pelanggan.customer_phone as telp_pelanggan', 'pelanggan.customer_address as alamat_pelanggan')
            ->first();
    }

    public function scopeDataCheckOut($query, $invoice)
    {
        return $query->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            ->where('bookings.invoice', $invoice)
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.customer_name as nama_pelanggan', 'pelanggan.customer_phone as telp_pelanggan', 'pelanggan.customer_address as alamat_pelanggan')
            ->first();
    }

    public function scopeInvoice($query, $invoice)
    {
        return $query->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            ->where('bookings.invoice', $invoice)
            ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.customer_name as nama_pelanggan', 'pelanggan.customer_phone', 'pelanggan.customer_address as alamat_pelanggan', 'pelanggan.customer_email')
            ->first();
    }

    // public function scopeLaporanBooking($query){
    //     return $query->join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
    //         ->join('users', 'bookings.id_user', '=', 'users.id')
    //         ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
    //         ->select([DB::raw("DATE_FORMAT(bookings.created_at, '%Y-%m') date_report"),DB::raw('YEAR(bookings.updated_at) year, MONTH(bookings.created_at) month'),'bookings.id', 'bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.customer_name as nama_pelanggan', 'pelanggan.customer_phone as telp_pelanggan', 'pelanggan.customer_address as alamat_pelanggan'])
    //         ->orderBy('date_report', 'desc')
    //         ->get();
    // }
}
