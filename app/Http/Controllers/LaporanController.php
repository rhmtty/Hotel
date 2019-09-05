<?php

namespace App\Http\Controllers;

use App\AktivitasKaryawan;
use App\Booking;
use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    //
    public function booking(Request $request, $id=null)
    {
             
        $bookings = Booking::join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
            ->join('users', 'bookings.id_user', '=', 'users.id')
            ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
            ->select([DB::raw("DATE_FORMAT(bookings.created_at, '%Y-%m') date_report"),DB::raw('YEAR(bookings.updated_at) year, MONTH(bookings.created_at) month'),'bookings.id', 'bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.nama as nama_pelanggan', 'pelanggan.telp as telp_pelanggan', 'pelanggan.alamat as alamat_pelanggan'])
            ->orderBy('date_report', 'desc')
            ->get();
        // dd($bookings);
            if($request->is('admin/laporan/bookings')){
                return view('laporan.booking.index', compact('bookings'));
            }else{
                $content = view ('laporan.booking.bookings', compact('bookings'));

                $pdf = new MPdf([
                    'orientation'=>"P",
                    'format'=>"Folio"
                ]);

                $pdf->WriteHTML($content);
                $pdf->Output(public_path().'/Laporan Data Booking','I');
                exit();
            }
            
    }

    public function indexAktivitas()
    {
         $aktifitas = AktivitasKaryawan::select('created_at')
        ->get()
        ->groupBy(function($date) {
            return carbon::parse($date->created_at)->format('M-Y');
        });
        return view('laporan.aktivitas.index', ['aktivitas' => $aktifitas]);
    }

    public function aktifitas(Request $request, $key=null)
    {
        $tgl = Carbon::parse($key)->startOfMonth()->format('d-M-Y');
        $tgl_end = Carbon::parse($key)->endOfMonth()->format('d-M-Y');

        // $bln = Carbon::parse($key);

        for($i = 1; $i < 13; $i++) {
            $aktifitas[$i] = AktivitasKaryawan::whereMonth('created_at', $i);
        dd($aktifitas[$i]);
        }
        $perbln = $aktifitas->where('created_at', '>', Carbon::parse($key)->startOfMonth())->where('created_at', '<', Carbon::parse($key)->endOfMonth());

        // $data = AktivitasKaryawan::whereMonth('created_at', '<=', $tgl)
        //     ->whereMonth('created_at', '>=', $tgl_end)
        //     ->orderBy('created_at', 'ASC')
        //     ->get()->toArray();
        
        $content = view('laporan.aktivitas.aktifitas', ['data' => $data]);

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
