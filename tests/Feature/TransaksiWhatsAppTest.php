<?php

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Http;

function transaksiUntukWhatsApp(string $status): Transaksi
{
    $pelanggan = Pelanggan::create([
        'nama' => 'Hafizah',
        'no_hp' => '0895391518953',
    ]);

    $paket = Paket::create([
        'nama_paket' => 'Express',
        'harga_per_kg' => 14000,
        'estimasi_hari' => 1,
        'menggunakan_setrika' => false,
    ]);

    return Transaksi::create([
        'pelanggan_id' => $pelanggan->id,
        'paket_id' => $paket->id,
        'berat' => 6,
        'harga_per_kg' => 14000,
        'total_harga' => 84000,
        'tanggal_masuk' => '2026-09-24',
        'tanggal_selesai' => '2026-09-25',
        'status' => $status,
    ]);
}

beforeEach(function () {
    config([
        'services.whatsapp.url' => 'http://127.0.0.1:3001',
        'services.whatsapp.token' => 'test-token',
    ]);
});

test('completed transaction sends the formatted WhatsApp message', function () {
    Http::fake([
        'http://127.0.0.1:3001/send' => Http::response(['sent' => true]),
    ]);

    $transaction = transaksiUntukWhatsApp('Selesai');

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.whatsapp', $transaction));

    $response
        ->assertRedirect()
        ->assertSessionHas('success', 'Pesan WhatsApp berhasil dikirim ke pelanggan.');

    Http::assertSent(function ($request) use ($transaction) {
        return $request->url() === 'http://127.0.0.1:3001/send'
            && $request->header('Authorization')[0] === 'Bearer test-token'
            && $request['phone'] === '62895391518953'
            && str_contains($request['message'], 'Kode Transaksi: #'.$transaction->id)
            && str_contains($request['message'], 'Total Pembayaran: Rp 84.000');
    });
});

test('transaction that is not completed cannot send a WhatsApp message', function () {
    Http::fake();

    $transaction = transaksiUntukWhatsApp('Dicuci');

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.whatsapp', $transaction));

    $response
        ->assertRedirect()
        ->assertSessionHasErrors('whatsapp');

    Http::assertNothingSent();
});
