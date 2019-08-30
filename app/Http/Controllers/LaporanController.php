<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class LaporanController extends Controller
{
    //
    public function booking()
    {
             
        $bookings = DB::select('SELECT a.id, b.no_kamar, c.fullname, d.nama, a.checkin_time, a.checkout_time, a.total, a.lama_menginap, a.keterangan, a.created_at, a.updated_at FROM bookings a
        INNER JOIN kamar b ON a.id_kamar=b.id
        INNER JOIN users c ON a.id_user=c.id
        INNER JOIN pelanggan d ON a.id_pelanggan=d.id');
        $content = view ('laporan.bookings',compact('bookings'));

        $pdf = new MPdf([
            'orientation'=>"P",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Data Booking','I');
        exit();
    }

    public function aktifitas()
    {
        $aktifitas = DB::table('aktivitas_karyawan')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        // $aktifitas = DB::select('SELECT id, nama_kary, info_kary, aktivitas, created_at, updated_at FROM aktivitas_karyawan');
        // $content =view ('laporan.aktifitas',compact('aktifitas'));

        $pdf = new MPdf([
            'orientation'=>"P",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Data Aktifitas Karyawan','I');
        exit();

    }
    public function pelanggan()
    {
        $pelanggan = DB::select('SELECT id, no_ktp, nama, telp, alamat, created_at, updated_at FROM pelanggan');
        $content =view ('laporan.pelanggan',compact('pelanggan'));

        $pdf = new MPdf([
            'orientation'=>"P",
            'format'=>"Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path().'/Laporan Data Pelanggan','I');
        exit();

    }

}
