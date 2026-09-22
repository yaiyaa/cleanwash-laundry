<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan laporan transaksi.
     */
    public function transaksi(Request $request)
    {
        $query = Transaksi::with([
            'pelanggan',
            'paket'
        ]);

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal_masuk',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'tanggal_masuk',
                '<=',
                $request->tanggal_akhir
            );
        }

        $transaksis = $query
            ->latest('tanggal_masuk')
            ->get();

        $totalTransaksi = $transaksis->count();
        $totalBerat = $transaksis->sum('berat');
        $totalPendapatan = $transaksis->sum('total_harga');

        return view('laporan.transaksi', compact(
            'transaksis',
            'totalTransaksi',
            'totalBerat',
            'totalPendapatan'
        ));
    }

    /**
     * Export laporan transaksi ke PDF.
     */
    public function exportPdf(Request $request)
    {
        $query = Transaksi::with([
            'pelanggan',
            'paket'
        ]);

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal_masuk',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'tanggal_masuk',
                '<=',
                $request->tanggal_akhir
            );
        }

        $transaksis = $query
            ->latest('tanggal_masuk')
            ->get();

        $totalTransaksi = $transaksis->count();
        $totalBerat = $transaksis->sum('berat');
        $totalPendapatan = $transaksis->sum('total_harga');

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact(
                'transaksis',
                'totalTransaksi',
                'totalBerat',
                'totalPendapatan'
            )
        );

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download(
            'laporan-transaksi-cleanwash.pdf'
        );
    }
}
