<x-app-layout>

    <x-slot name="header">

        <div>
            <p
                class="text-xs font-semibold uppercase tracking-widest"
                style="color: #4c9aca;"
            >
                CLEANWASH
            </p>

            <h2 class="mt-1 text-xl font-bold text-gray-800">
                Detail Transaksi Laundry
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- KEMBALI --}}
            <div class="mb-6">

                <a
                    href="{{ route('transaksi.index') }}"
                    class="inline-flex items-center text-sm font-semibold"
                    style="
                        color: #0f6fb5;
                        text-decoration: none;
                    "
                >

                    <svg
                        width="17"
                        height="17"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    <span class="ml-2">
                        Kembali ke Transaksi
                    </span>

                </a>

            </div>


            {{-- CARD UTAMA --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- HEADER --}}
                <div
                    class="relative overflow-hidden px-6 py-7 sm:px-8"
                    style="
                        background: linear-gradient(110deg, #e8f5ff, #ffffff);
                    "
                >

                    {{-- BUBBLE --}}
                    <div
                        class="absolute -right-8 -top-10 h-32 w-32 rounded-full"
                        style="background-color: rgba(15,111,181,0.08);"
                    ></div>

                    <div
                        class="absolute right-32 bottom-[-25px] h-20 w-20 rounded-full"
                        style="background-color: rgba(76,154,202,0.07);"
                    ></div>


                    <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            {{-- ICON --}}
                            <div
                                class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl"
                                style="
                                    background-color: #dff2ff;
                                    color: #0f6fb5;
                                "
                            >

                                <svg
                                    width="30"
                                    height="30"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-width="2"
                                        d="M8 8h8M8 12h8M8 16h5"
                                    />

                                </svg>

                            </div>


                            <div>

                                <p
                                    class="text-xs font-semibold uppercase tracking-wider"
                                    style="color: #5c8aa5;"
                                >
                                    Transaksi #{{ $transaksi->id }}
                                </p>

                                <h1 class="mt-1 text-2xl font-bold text-gray-800">
                                    {{ $transaksi->pelanggan->nama }}
                                </h1>

                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $transaksi->paket->nama_paket }}
                                </p>

                            </div>

                        </div>


                        {{-- STATUS --}}
                        @php
                            $statusStyle = match ($transaksi->status) {

                                'Diterima' => [
                                    'background' => '#e8f5ff',
                                    'color' => '#0f6fb5',
                                ],

                                'Dicuci' => [
                                    'background' => '#eff6ff',
                                    'color' => '#2563eb',
                                ],

                                'Disetrika' => [
                                    'background' => '#fff7ed',
                                    'color' => '#c2410c',
                                ],

                                'Selesai' => [
                                    'background' => '#ecfdf5',
                                    'color' => '#15803d',
                                ],

                                'Diambil' => [
                                    'background' => '#f3f4f6',
                                    'color' => '#4b5563',
                                ],

                                default => [
                                    'background' => '#f3f4f6',
                                    'color' => '#4b5563',
                                ],
                            };
                        @endphp


                        <div
                            class="inline-flex w-fit items-center rounded-full px-4 py-2 text-sm font-bold"
                            style="
                                background-color: {{ $statusStyle['background'] }};
                                color: {{ $statusStyle['color'] }};
                            "
                        >

                            <span
                                class="mr-2 h-2 w-2 rounded-full"
                                style="background-color: {{ $statusStyle['color'] }};"
                            ></span>

                            {{ $transaksi->status }}

                        </div>

                    </div>

                </div>


                {{-- ISI --}}
                <div class="p-6 sm:p-8">


                    {{-- INFORMASI PELANGGAN --}}
                    <div class="mb-8">

                        <div class="mb-4 flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl"
                                style="
                                    background-color: #e8f5ff;
                                    color: #0f6fb5;
                                "
                            >

                                <svg
                                    width="20"
                                    height="20"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="4"
                                        stroke-width="2"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-width="2"
                                        d="M4 21a8 8 0 0116 0"
                                    />

                                </svg>

                            </div>


                            <div>

                                <h3 class="text-base font-bold text-gray-800">
                                    Informasi Pelanggan
                                </h3>

                                <p class="text-xs text-gray-400">
                                    Data pelanggan yang melakukan laundry.
                                </p>

                            </div>

                        </div>


                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                            {{-- NAMA --}}
                            <div
                                class="rounded-xl border p-4"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Nama Pelanggan
                                </p>

                                <p class="mt-1 text-sm font-bold text-gray-800">
                                    {{ $transaksi->pelanggan->nama }}
                                </p>

                            </div>


                            {{-- NO HP --}}
                            <div
                                class="rounded-xl border p-4"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Nomor HP
                                </p>

                                <p class="mt-1 text-sm font-bold text-gray-800">
                                    {{ $transaksi->pelanggan->no_hp }}
                                </p>

                            </div>


                            {{-- ALAMAT --}}
                            <div
                                class="rounded-xl border p-4 md:col-span-2"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Alamat
                                </p>

                                <p class="mt-1 text-sm leading-6 text-gray-700">
                                    {{ $transaksi->pelanggan->alamat }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- INFORMASI LAUNDRY --}}
                    <div class="mb-8">

                        <div class="mb-4 flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl"
                                style="
                                    background-color: #e8f5ff;
                                    color: #0f6fb5;
                                "
                            >
                                🧺
                            </div>


                            <div>

                                <h3 class="text-base font-bold text-gray-800">
                                    Informasi Laundry
                                </h3>

                                <p class="text-xs text-gray-400">
                                    Rincian paket dan perhitungan transaksi.
                                </p>

                            </div>

                        </div>


                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

                            {{-- PAKET --}}
                            <div
                                class="rounded-xl border p-4"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Paket Laundry
                                </p>

                                <p
                                    class="mt-1 text-sm font-bold"
                                    style="color: #0f6fb5;"
                                >
                                    {{ $transaksi->paket->nama_paket }}
                                </p>

                            </div>


                            {{-- BERAT --}}
                            <div
                                class="rounded-xl border p-4"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Berat
                                </p>

                                <p class="mt-1 text-sm font-bold text-gray-800">
                                    {{ $transaksi->berat }}

                                    <span class="font-medium text-gray-400">
                                        Kg
                                    </span>
                                </p>

                            </div>


                            {{-- HARGA --}}
                            <div
                                class="rounded-xl border p-4"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Harga / Kg
                                </p>

                                <p class="mt-1 text-sm font-bold text-gray-800">
                                    Rp {{ number_format($transaksi->harga_per_kg, 0, ',', '.') }}
                                </p>

                            </div>


                            {{-- TOTAL --}}
                            <div
                                class="rounded-xl border p-4"
                                style="
                                    border-color: #c9e7f8;
                                    background-color: #f3faff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Total Harga
                                </p>

                                <p
                                    class="mt-1 text-base font-bold"
                                    style="color: #0f6fb5;"
                                >
                                    Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="mb-8">

                        <div class="mb-4 flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-xl"
                                style="
                                    background-color: #e8f5ff;
                                    color: #0f6fb5;
                                "
                            >

                                <svg
                                    width="21"
                                    height="21"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <rect
                                        x="3"
                                        y="4"
                                        width="18"
                                        height="18"
                                        rx="2"
                                        stroke-width="2"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-width="2"
                                        d="M16 2v4M8 2v4M3 10h18"
                                    />

                                </svg>

                            </div>


                            <div>

                                <h3 class="text-base font-bold text-gray-800">
                                    Jadwal Laundry
                                </h3>

                                <p class="text-xs text-gray-400">
                                    Informasi tanggal pengerjaan laundry.
                                </p>

                            </div>

                        </div>


                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            {{-- TANGGAL MASUK --}}
                            <div
                                class="rounded-xl border p-5"
                                style="
                                    border-color: #dcecf7;
                                    background-color: #fbfdff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Tanggal Masuk
                                </p>

                                <p class="mt-2 text-lg font-bold text-gray-800">
                                    {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                                </p>

                            </div>


                            {{-- TANGGAL SELESAI --}}
                            <div
                                class="rounded-xl border p-5"
                                style="
                                    border-color: #c9e7f8;
                                    background-color: #f3faff;
                                "
                            >

                                <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    Tanggal Selesai
                                </p>

                                <p
                                    class="mt-2 text-lg font-bold"
                                    style="color: #0f6fb5;"
                                >
                                    {{ $transaksi->tanggal_selesai
                                        ? $transaksi->tanggal_selesai->format('d-m-Y')
                                        : '-' }}
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- CATATAN STATUS --}}
                    <div
                        class="mb-7 flex items-start gap-3 rounded-xl border px-4 py-4"
                        style="
                            background-color: #f3faff;
                            border-color: #dcecf7;
                        "
                    >

                        <div
                            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full"
                            style="
                                background-color: #e0f2fe;
                                color: #0f6fb5;
                            "
                        >
                            💧
                        </div>

                        <div>

                            <p class="text-sm font-bold text-gray-700">
                                Status Laundry
                            </p>

                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                Laundry saat ini berada pada tahap
                                <strong>{{ $transaksi->status }}</strong>.
                            </p>

                        </div>

                    </div>


                    {{-- PESAN WHATSAPP --}}
                    @if ($transaksi->status === 'Selesai')

                        @php

                            $nomorWhatsApp = preg_replace(
                                '/[^0-9]/',
                                '',
                                $transaksi->pelanggan->no_hp
                            );

                            // Jika nomor diawali 0, ubah menjadi 62
                            if (str_starts_with($nomorWhatsApp, '0')) {
                                $nomorWhatsApp = '62' . substr($nomorWhatsApp, 1);
                            }

                            $pesanWhatsApp =
                                'Halo ' . $transaksi->pelanggan->nama . ' ' . "\n\n" .
                                'Laundry Anda sudah SELESAI dan dapat diambil. ' . "\n\n" .
                                'Detail Laundry:' . "\n" .
                                'Kode Transaksi: #' . $transaksi->id . "\n" .
                                'Paket: ' . $transaksi->paket->nama_paket . "\n" .
                                'Berat: ' . $transaksi->berat . ' Kg' . "\n" .
                                'Total Pembayaran: Rp ' .
                                number_format($transaksi->total_harga, 0, ',', '.') . "\n\n" .
                                'Silakan datang ke CleanWash untuk mengambil laundry Anda.' . "\n\n" .
                                'Terima kasih telah menggunakan layanan CleanWash.';

                            $linkWhatsApp =
                                'https://wa.me/' .
                                $nomorWhatsApp .
                                '?text=' .
                                urlencode($pesanWhatsApp);

                        @endphp


                        {{-- KOTAK NOTIFIKASI --}}
                        <div
                            class="mb-7 rounded-2xl border p-5"
                            style="
                                background-color: #f0fdf4;
                                border-color: #bbf7d0;
                            "
                        >

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                <div class="flex items-start gap-3">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full"
                                        style="
                                            background-color: #dcfce7;
                                            color: #16a34a;
                                        "
                                    >
                                        📱
                                    </div>


                                    <div>

                                        <p class="text-sm font-bold text-green-800">
                                            Laundry sudah selesai
                                        </p>

                                        <p class="mt-1 text-xs leading-5 text-green-700">
                                            Kirim pemberitahuan kepada pelanggan melalui WhatsApp
                                            bahwa laundry sudah dapat diambil.
                                        </p>

                                    </div>

                                </div>


                                {{-- TOMBOL WHATSAPP --}}
                                <a
                                    href="{{ $linkWhatsApp }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl px-5 py-2.5 text-sm font-bold text-white transition hover:opacity-90"
                                    style="
                                        background-color: #16a34a;
                                        text-decoration: none;
                                        box-shadow: 0 5px 14px rgba(22,163,74,0.18);
                                    "
                                >

                                    <svg
                                        width="19"
                                        height="19"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.05-.371-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.075-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.54 1.213 2.717.149.174 2.095 3.2 5.077 4.487.71.306 1.263.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
                                        />

                                        <path
                                            d="M12.004 2C6.478 2 2 6.477 2 12c0 1.77.46 3.43 1.257 4.89L2 22l5.255-1.238A9.96 9.96 0 0 0 12.004 22C17.523 22 22 17.523 22 12S17.523 2 12.004 2zm0 18.3c-1.54 0-3.03-.416-4.34-1.204l-.31-.185-3.12.735.742-3.043-.202-.322A8.29 8.29 0 1 1 12.004 20.3z"
                                        />

                                    </svg>

                                    Kirim WhatsApp

                                </a>

                            </div>

                        </div>

                    @endif


                    {{-- GARIS --}}
                    <div
                        class="mb-6 border-t"
                        style="border-color: #edf3f7;"
                    ></div>


                    {{-- BUTTON --}}
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                        <a
                            href="{{ route('transaksi.index') }}"
                            class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-semibold"
                            style="
                                background-color: #f3f4f6;
                                color: #374151;
                                text-decoration: none;
                            "
                        >
                            Kembali
                        </a>


                        <a
                            href="{{ route('transaksi.edit', $transaksi) }}"
                            class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold text-white"
                            style="
                                background-color: #0f6fb5;
                                text-decoration: none;
                                box-shadow: 0 5px 14px rgba(15,111,181,0.18);
                            "
                        >

                            <svg
                                width="17"
                                height="17"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                class="mr-2"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                />

                            </svg>

                            Edit Transaksi

                        </a>

                    </div>

                </div>

            </div>


            {{-- LINK BAWAH --}}
            <div class="mt-5">

                <a
                    href="{{ route('transaksi.index') }}"
                    class="text-sm font-semibold"
                    style="
                        color: #6b8193;
                        text-decoration: none;
                    "
                >
                    ← Kembali ke daftar transaksi
                </a>

            </div>

        </div>

    </div>

</x-app-layout>
