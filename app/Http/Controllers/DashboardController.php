<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Paket;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        // Total seluruh pelanggan
        $totalPelanggan = Pelanggan::count();

        // Total seluruh paket laundry
        $totalPaket = Paket::count();

        // Total transaksi yang masih aktif
        // Tidak termasuk transaksi yang sudah Diambil
        $transaksiAktif = Transaksi::where(
            'status',
            '!=',
            'Diambil'
        )->count();

        // Total transaksi yang sudah diambil pelanggan
        $transaksiDiambil = Transaksi::where(
            'status',
            'Diambil'
        )->count();

        return view('dashboard', compact(
            'totalPelanggan',
            'totalPaket',
            'transaksiAktif',
            'transaksiDiambil'
        ));
    }
}
