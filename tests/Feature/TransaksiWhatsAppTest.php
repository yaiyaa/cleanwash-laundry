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

test('complete action updates status and sends the formatted WhatsApp message', function () {
    Http::fake([
        'http://127.0.0.1:3001/send' => Http::response(['sent' => true]),
    ]);

    $transaction = transaksiUntukWhatsApp('Dicuci');

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.selesai', $transaction));

    $response
        ->assertRedirect()
        ->assertSessionHas('success', 'Laundry selesai dan pesan WhatsApp berhasil dikirim.');

    expect($transaction->refresh()->status)->toBe('Selesai');

    Http::assertSent(function ($request) use ($transaction) {
        return $request->url() === 'http://127.0.0.1:3001/send'
            && $request->header('Authorization')[0] === 'Bearer test-token'
            && $request['phone'] === '62895391518953'
            && str_contains($request['message'], 'Kode Transaksi: #'.$transaction->id)
            && str_contains($request['message'], 'Total Pembayaran: Rp 84.000');
    });
});

test('completed transaction cannot be completed and send WhatsApp again', function () {
    Http::fake();

    $transaction = transaksiUntukWhatsApp('Selesai');

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.selesai', $transaction));

    $response
        ->assertRedirect()
        ->assertSessionHasErrors('status');

    Http::assertNothingSent();
});

test('completed transaction can be marked as picked up', function () {
    $transaction = transaksiUntukWhatsApp('Selesai');

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.diambil', $transaction));

    $response
        ->assertRedirect()
        ->assertSessionHas('success', 'Laundry berhasil ditandai sudah diambil.');

    expect($transaction->refresh()->status)->toBe('Diambil');
});

test('unfinished transaction cannot be marked as picked up', function () {
    $transaction = transaksiUntukWhatsApp('Dicuci');

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.diambil', $transaction));

    $response
        ->assertRedirect()
        ->assertSessionHasErrors('status');

    expect($transaction->refresh()->status)->toBe('Dicuci');
});
