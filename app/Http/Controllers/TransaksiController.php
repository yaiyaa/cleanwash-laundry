<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Throwable;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'paket'])
            ->latest()
            ->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function riwayat()
    {
        $transaksis = Transaksi::with(['pelanggan', 'paket'])
            ->where('status', 'Diambil')
            ->latest()
            ->get();

        return view('transaksi.riwayat', compact('transaksis'));
    }

    public function create()
    {
        $pakets = Paket::orderBy('nama_paket')->get();

        return view('transaksi.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'paket_id' => 'required|exists:pakets,id',
            'berat' => 'required|numeric|min:0.1',
            'tanggal_masuk' => 'required|date',
        ]);

        $pelanggan = Pelanggan::firstOrCreate([
            'nama' => $validated['nama'],
            'no_hp' => $validated['no_hp'],
        ]);

        $paket = Paket::findOrFail($validated['paket_id']);

        $hargaPerKg = $paket->harga_per_kg;

        $totalHarga = $validated['berat'] * $hargaPerKg;

        $tanggalSelesai = date(
            'Y-m-d',
            strtotime(
                $validated['tanggal_masuk'].
                ' +'.
                $paket->estimasi_hari.
                ' days'
            )
        );

        Transaksi::create([
            'pelanggan_id' => $pelanggan->id,
            'paket_id' => $validated['paket_id'],
            'berat' => $validated['berat'],
            'harga_per_kg' => $hargaPerKg,
            'total_harga' => $totalHarga,
            'tanggal_masuk' => $validated['tanggal_masuk'],
            'tanggal_selesai' => $tanggalSelesai,
            'status' => 'Dicuci',
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi laundry berhasil ditambahkan.');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['pelanggan', 'paket']);

        return view('transaksi.show', compact('transaksi'));
    }

    public function selesai(Transaksi $transaksi, WhatsAppService $whatsappService)
    {
        if (in_array($transaksi->status, ['Selesai', 'Diambil'], true)) {
            return back()->withErrors([
                'status' => 'Transaksi ini sudah selesai atau sudah diambil.',
            ]);
        }

        $transaksi->update(['status' => 'Selesai']);

        try {
            $whatsappService->sendLaundryCompletedMessage($transaksi);
        } catch (Throwable $exception) {
            report($exception);

            return back()->with('warning', 'Laundry ditandai selesai, tetapi WhatsApp gagal dikirim.');
        }

        return back()->with('success', 'Laundry selesai dan pesan WhatsApp berhasil dikirim.');
    }

    public function diambil(Transaksi $transaksi)
    {
        if ($transaksi->status !== 'Selesai') {
            return back()->withErrors([
                'status' => 'Laundry hanya dapat ditandai diambil setelah statusnya Selesai.',
            ]);
        }

        $transaksi->update(['status' => 'Diambil']);

        return back()->with('success', 'Laundry berhasil ditandai sudah diambil.');
    }

    public function edit(Transaksi $transaksi)
    {
        $pakets = Paket::orderBy('nama_paket')->get();

        return view('transaksi.edit', compact(
            'transaksi',
            'pakets'
        ));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'paket_id' => 'required|exists:pakets,id',
            'berat' => 'required|numeric|min:0.1',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:Diterima,Dicuci,Disetrika,Selesai,Diambil',
        ]);

        $paket = Paket::findOrFail($validated['paket_id']);
        $pelanggan = Pelanggan::firstOrCreate([
            'nama' => $validated['nama'],
            'no_hp' => $validated['no_hp'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK URUTAN STATUS
        |--------------------------------------------------------------------------
        */

        $statusSekarang = $transaksi->status;
        $statusBaru = $validated['status'];

        /*
        |--------------------------------------------------------------------------
        | Jika status tidak berubah, tetap diperbolehkan.
        |--------------------------------------------------------------------------
        */

        if ($statusBaru !== $statusSekarang) {

            /*
            | Tentukan status berikutnya berdasarkan paket.
            */

            if ($statusSekarang === 'Diterima') {

                $statusBerikutnya = 'Dicuci';

            } elseif ($statusSekarang === 'Dicuci') {

                if ($paket->menggunakan_setrika) {
                    $statusBerikutnya = 'Disetrika';
                } else {
                    $statusBerikutnya = 'Selesai';
                }

            } elseif ($statusSekarang === 'Disetrika') {

                $statusBerikutnya = 'Selesai';

            } elseif ($statusSekarang === 'Selesai') {

                $statusBerikutnya = 'Diambil';

            } else {

                // Jika sudah Diambil, status tidak boleh diubah lagi.
                return back()
                    ->withErrors([
                        'status' => 'Transaksi yang sudah diambil tidak dapat diubah lagi.',
                    ])
                    ->withInput();
            }

            /*
            |--------------------------------------------------------------------------
            | Pastikan status baru adalah tepat satu tahap berikutnya.
            |--------------------------------------------------------------------------
            */

            if ($statusBaru !== $statusBerikutnya) {

                return back()
                    ->withErrors([
                        'status' => 'Status tidak dapat dilewati. '.
                            'Status berikutnya harus "'.
                            $statusBerikutnya.
                            '".',
                    ])
                    ->withInput();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Paket tanpa setrika tidak boleh menggunakan status Disetrika.
        |--------------------------------------------------------------------------
        */

        if (
            ! $paket->menggunakan_setrika &&
            $statusBaru === 'Disetrika'
        ) {
            return back()
                ->withErrors([
                    'status' => 'Paket ini tidak menggunakan proses setrika.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Hitung ulang harga
        |--------------------------------------------------------------------------
        */

        $hargaPerKg = $paket->harga_per_kg;

        $totalHarga = $validated['berat'] * $hargaPerKg;

        /*
        |--------------------------------------------------------------------------
        | Hitung tanggal selesai
        |--------------------------------------------------------------------------
        */

        $tanggalSelesai = date(
            'Y-m-d',
            strtotime(
                $validated['tanggal_masuk'].
                ' +'.
                $paket->estimasi_hari.
                ' days'
            )
        );

        /*
        |--------------------------------------------------------------------------
        | Update transaksi
        |--------------------------------------------------------------------------
        */

        $transaksi->update([
            'pelanggan_id' => $pelanggan->id,
            'paket_id' => $validated['paket_id'],
            'berat' => $validated['berat'],
            'harga_per_kg' => $hargaPerKg,
            'total_harga' => $totalHarga,
            'tanggal_masuk' => $validated['tanggal_masuk'],
            'tanggal_selesai' => $tanggalSelesai,
            'status' => $statusBaru,
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
