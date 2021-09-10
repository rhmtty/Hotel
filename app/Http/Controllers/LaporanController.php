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
    /**
     * Laporan data booking
     */
    public function booking(Request $request, $tgl = null)
    {

        if ($request->is('admin/laporan/bookings')) {
            $param = Carbon::parse($tgl)->format('Y-m');

            $bookings = Booking::join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
                ->join('users', 'bookings.id_user', '=', 'users.id')
                ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
                ->select([DB::raw("DATE_FORMAT(bookings.created_at, '%Y-%m') date_report"), DB::raw('YEAR(bookings.updated_at) year, MONTH(bookings.created_at) month'), 'bookings.id', 'bookings.created_at'])
                ->get()
                ->groupBy('date_report', 'desc');

            $data = $bookings->sortBy('date_report');
            return view('laporan.booking.index', compact('bookings', 'param'));
        } else {
            // $gtotal = Booking::sum('total');

            // $total[0] = 0;
            // $total[0] += $bookings[0]->total;

            $tgl_awal = Carbon::parse($tgl)->startOfMonth();
            $tgl_akhir = Carbon::parse($tgl)->endOfMonth();
            $data = Carbon::parse($tgl);

            $bookings = Booking::join('kamar', 'bookings.id_kamar', '=', 'kamar.id')
                ->join('users', 'bookings.id_user', '=', 'users.id')
                ->join('pelanggan', 'bookings.id_pelanggan', '=', 'pelanggan.id')
                ->select('bookings.*', 'kamar.no_kamar as nomer_kamar', 'kamar.lantai as lantai_kamar', 'kamar.blok_id as nama_blok', 'kamar.tipe as tipe_kamar', 'kamar.harga as harga_kamar', 'kamar.fasilitas as fasilitas_kamar', 'users.fullname as operator', 'pelanggan.no_ktp as ktp_pelanggan', 'pelanggan.nama as nama_pelanggan', 'pelanggan.telp as telp_pelanggan', 'pelanggan.alamat as alamat_pelanggan', 'bookings.total')
                ->whereBetween('bookings.created_at', [$tgl_awal, $tgl_akhir])
                // ->groupBy('bookings.id')
                // ->sum('total')
                ->get();
            $gtotal = $bookings->sum('total');
            // dd($bookings, $gtotal);
            $content = view('laporan.booking.pdf', compact('bookings', 'data', 'gtotal'))->render();

            $pdf = new MPdf([
                'orientation' => "P",
                'format' => "Folio"
            ]);

            $pdf->WriteHTML($content);
            $pdf->Output(public_path() . '/Laporan Data Booking', 'I');
            exit();
        }
    }

    /**
     * Laporan Aktivitas Karyawan
     */
    public function indexAktivitas()
    {
        $aktifitas = AktivitasKaryawan::select('created_at')
            ->get()
            ->groupBy(function ($date) {
                return carbon::parse($date->created_at)->format('M-Y');
            });
        return view('laporan.aktivitas.index', ['aktivitas' => $aktifitas]);
    }

    public function aktifitas($key)
    {
        $tgl = Carbon::parse($key)->startOfMonth();
        $tgl_end = Carbon::parse($key)->endOfMonth();

        $lapbln = Carbon::parse($key);

        $aktivitas = DB::table('aktivitas_karyawan')->whereBetween('created_at', [$tgl, $tgl_end])->get();

        $content = view('laporan.aktivitas.pdf', [
            'aktivitas' => $aktivitas,
            'bln' => $lapbln
        ]);

        $pdf = new MPdf([
            'orientation' => "P",
            'format' => "Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path() . '/Laporan Data Aktifitas Karyawan', 'I');
        exit();
    }

    /**
     * Laporan data pelanggan
     */
    public function pelanggan()
    {
        $pelanggan = Pelanggan::get();
        $content = view('laporan.pelanggan.pdf', compact('pelanggan'));

        $pdf = new MPdf([
            'orientation' => "P",
            'format' => "Folio"
        ]);

        $pdf->WriteHTML($content);
        $pdf->Output(public_path() . '/Laporan Data Pelanggan', 'I');
        exit();
    }
}
