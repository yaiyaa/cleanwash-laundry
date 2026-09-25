<?php

namespace App\Services;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class WhatsAppService
{
    public function sendLaundryCompletedMessage(Transaksi $transaksi): void
    {
        $url = config('services.whatsapp.url');
        $token = config('services.whatsapp.token');

        if (! is_string($url) || $url === '' || ! is_string($token) || $token === '') {
            throw new RuntimeException('Konfigurasi WhatsApp bot belum diatur.');
        }

        $transaksi->loadMissing(['pelanggan', 'paket']);

        Http::acceptJson()
            ->withToken($token)
            ->timeout(10)
            ->post(rtrim($url, '/').'/send', [
                'phone' => $this->normalizePhoneNumber($transaksi->pelanggan->no_hp),
                'message' => $this->completedMessage($transaksi),
            ])
            ->throw();
    }

    public function completedMessage(Transaksi $transaksi): string
    {
        $transaksi->loadMissing(['pelanggan', 'paket']);

        return 'Halo '.$transaksi->pelanggan->nama."\n\n".
            "Laundry Anda sudah SELESAI dan dapat diambil.\n\n".
            "Detail Laundry:\n".
            'Kode Transaksi: #'.$transaksi->id."\n".
            'Paket: '.$transaksi->paket->nama_paket."\n".
            'Berat: '.$transaksi->berat." Kg\n".
            'Total Pembayaran: Rp '.number_format($transaksi->total_harga, 0, ',', '.')."\n\n".
            "Silakan datang ke CleanWash untuk mengambil laundry Anda.\n\n".
            'Terima kasih telah menggunakan layanan CleanWash.';
    }

    public function normalizePhoneNumber(string $phoneNumber): string
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber) ?? '';

        if (str_starts_with($phoneNumber, '0')) {
            return '62'.substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }
}
