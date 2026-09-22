<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga_per_kg',
        'estimasi_hari',
        'menggunakan_setrika',
    ];

    protected $casts = [
    'harga_per_kg' => 'decimal:2',
    'menggunakan_setrika' => 'boolean',
];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
