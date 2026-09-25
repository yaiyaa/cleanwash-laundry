<?php

use App\Models\Paket;
use App\Models\User;

test('transaction creation stores customer details entered manually', function () {
    $paket = Paket::create([
        'nama_paket' => 'Express',
        'harga_per_kg' => 14000,
        'estimasi_hari' => 1,
        'menggunakan_setrika' => false,
    ]);

    $response = $this
        ->actingAs(User::factory()->create())
        ->post(route('transaksi.store'), [
            'nama' => 'Pelanggan Manual',
            'no_hp' => '081234567890',
            'paket_id' => $paket->id,
            'berat' => 3,
            'tanggal_masuk' => '2026-09-25',
        ]);

    $response
        ->assertRedirect(route('transaksi.index'))
        ->assertSessionHasNoErrors();

    $this->assertDatabaseHas('pelanggans', [
        'nama' => 'Pelanggan Manual',
        'no_hp' => '081234567890',
    ]);

    $this->assertDatabaseHas('transaksis', [
        'paket_id' => $paket->id,
        'berat' => 3,
    ]);
});
