<?php

namespace App\Http\Controllers;

use App\Booking;
use App\AktivitasKaryawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['aktivitas'] = AktivitasKaryawan::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.dashboard', $data);
    }

    /**
     * DELETE AKTIVITAS
     */
    public function delete($id)
    {
        $akivitas = AktivitasKaryawan::find($id);
        $akivitas->delete();
        return back()->with('success', 'Aktivitas Karyawan Berhasil Dihapus!');
    }

    public function customerInvoice($invoice)
    {
        $trx = Booking::invoice($invoice);

        return view('partials.leftbar', compact('trx'));
    }
}
