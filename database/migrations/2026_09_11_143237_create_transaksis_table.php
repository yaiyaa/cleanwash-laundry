<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->cascadeOnDelete();

            $table->foreignId('paket_id')
                ->constrained('pakets')
                ->cascadeOnDelete();

            $table->decimal('berat', 8, 2);
            $table->decimal('harga_per_kg', 12, 2);
            $table->decimal('total_harga', 12, 2);
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai')->nullable();
            $table->string('status', 30)->default('Diterima');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
