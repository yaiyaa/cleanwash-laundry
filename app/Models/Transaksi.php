<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id',
        'paket_id',
        'berat',
        'harga_per_kg',
        'total_harga',
        'tanggal_masuk',
        'tanggal_selesai',
        'status',
    ];

    protected $casts = [
        'berat' => 'decimal:2',
        'harga_per_kg' => 'decimal:2',
        'total_harga' => 'decimal:2',
        'tanggal_masuk' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function paket(): BelongsTo
    {
        return $this->belongsTo(Paket::class);
    }
}
