<x-app-layout>

    <div class="cleanwash-dashboard">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <div class="cleanwash-hero">

                <div class="cleanwash-hero-bubble bubble-1"></div>
                <div class="cleanwash-hero-bubble bubble-2"></div>
                <div class="cleanwash-hero-bubble bubble-3"></div>

                <div class="cleanwash-hero-content">

                    <p class="cleanwash-hero-small">
                        OUTPUT SISTEM
                    </p>

                    <h1>
                        Laporan
                        <span>Transaksi</span>
                    </h1>

                    <p class="cleanwash-hero-description">
                        Lihat dan cetak laporan transaksi laundry
                        CleanWash.
                    </p>

                </div>

            </div>


            {{-- =================================================
                 FILTER
            ================================================== --}}

            <div class="cleanwash-section-card mt-6">

                <div class="cleanwash-section-header">

                    <div>

                        <h2>
                            Filter Laporan
                        </h2>

                        <p>
                            Tentukan periode transaksi yang ingin ditampilkan.
                        </p>

                    </div>

                    <div class="cleanwash-section-bubble">
                        📊
                    </div>

                </div>


                <form
                    method="GET"
                    action="{{ route('laporan.transaksi') }}"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5"
                >

                    {{-- Tanggal Mulai --}}

                    <div>

                        <label class="block text-sm font-medium mb-2">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="{{ request('tanggal_mulai') }}"
                            class="w-full rounded-xl border-gray-200"
                        >

                    </div>


                    {{-- Tanggal Akhir --}}

                    <div>

                        <label class="block text-sm font-medium mb-2">
                            Tanggal Akhir
                        </label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            value="{{ request('tanggal_akhir') }}"
                            class="w-full rounded-xl border-gray-200"
                        >

                    </div>


                    {{-- Tombol --}}

                    <div class="flex items-end gap-2">

                        <button
                            type="submit"
                            class="cleanwash-hero-button"
                        >
                            Tampilkan
                        </button>

                        <a
                            href="{{ route('laporan.transaksi') }}"
                            class="px-5 py-3 rounded-xl border border-gray-200 text-sm font-medium"
                        >
                            Reset
                        </a>

                    </div>

                </form>

            </div>


            {{-- =================================================
                 RINGKASAN LAPORAN
            ================================================== --}}

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">


                {{-- Total Transaksi --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon blue">

                        <svg
                            width="22"
                            height="22"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 14h6M9 18h6M9 6h6M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"
                            />

                        </svg>

                    </div>

                    <div>

                        <p>
                            Total Transaksi
                        </p>

                        <h3>
                            {{ $totalTransaksi }}
                        </h3>

                        <span>
                            Transaksi pada periode
                        </span>

                    </div>

                </div>


                {{-- Total Berat --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon purple">

                        <svg
                            width="22"
                            height="22"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 3v18M5 8h14M5 16h14"
                            />

                        </svg>

                    </div>

                    <div>

                        <p>
                            Total Berat
                        </p>

                        <h3>
                            {{ number_format($totalBerat, 2, ',', '.') }}
                            <small style="font-size: 14px;">kg</small>
                        </h3>

                        <span>
                            Berat seluruh transaksi
                        </span>

                    </div>

                </div>


                {{-- Total Pendapatan --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon green">

                        <svg
                            width="22"
                            height="22"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8c-2.21 0-4 1.12-4 2.5S9.79 13 12 13s4 1.12 4 2.5S14.21 18 12 18M12 5v14"
                            />

                        </svg>

                    </div>

                    <div>

                        <p>
                            Total Pendapatan
                        </p>

                        <h3>
                            Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </h3>

                        <span>
                            Pendapatan transaksi
                        </span>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 DATA LAPORAN
            ================================================== --}}

            <div class="cleanwash-section-card mt-6">

                <div class="cleanwash-section-header">

                    <div>

                        <h2>
                            Data Laporan Transaksi
                        </h2>

                        <p>
                            Daftar transaksi berdasarkan periode yang dipilih.
                        </p>

                    </div>

                    <div class="flex flex-wrap gap-2">

    {{-- Export Excel --}}



    {{-- Export PDF --}}

    <a
        href="{{ route('laporan.export.pdf', request()->query()) }}"
        class="px-4 py-2 rounded-xl bg-red-600 text-white text-sm font-medium hover:bg-red-700 transition"
    >
        📄 Export PDF
    </a>


    {{-- Cetak --}}

    <button
        type="button"
        onclick="window.print()"
        class="px-4 py-2 rounded-xl border border-gray-200 text-sm font-medium hover:bg-gray-50 transition"
    >
        🖨 Cetak
    </button>

</div>

                </div>


                {{-- Tabel --}}

                <div class="overflow-x-auto mt-5">

                    <table class="w-full">

                        <thead>

                            <tr>

                                <th class="text-left px-4 py-3">
                                    No
                                </th>

                                <th class="text-left px-4 py-3">
                                    Pelanggan
                                </th>

                                <th class="text-left px-4 py-3">
                                    Paket
                                </th>

                                <th class="text-left px-4 py-3">
                                    Berat
                                </th>

                                <th class="text-left px-4 py-3">
                                    Total Harga
                                </th>

                                <th class="text-left px-4 py-3">
                                    Tanggal Masuk
                                </th>

                                <th class="text-left px-4 py-3">
                                    Status
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($transaksis as $transaksi)

                                <tr class="border-t">

                                    <td class="px-4 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-4 font-medium">
                                        {{ $transaksi->pelanggan->nama }}
                                    </td>

                                    <td class="px-4 py-4">
                                        {{ $transaksi->paket->nama_paket }}
                                    </td>

                                    <td class="px-4 py-4">
                                        {{ number_format($transaksi->berat, 2, ',', '.') }}
                                        kg
                                    </td>

                                    <td class="px-4 py-4">
                                        Rp
                                        {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td class="px-4 py-4">
                                        {{ $transaksi->tanggal_masuk->format('d/m/Y') }}
                                    </td>

                                    <td class="px-4 py-4">

                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-medium
                                            @if($transaksi->status === 'Diterima')
                                                bg-blue-100 text-blue-700
                                            @elseif($transaksi->status === 'Dicuci')
                                                bg-blue-100 text-blue-700
                                            @elseif($transaksi->status === 'Disetrika')
                                                bg-orange-100 text-orange-700
                                            @elseif($transaksi->status === 'Selesai')
                                                bg-green-100 text-green-700
                                            @else
                                                bg-gray-100 text-gray-700
                                            @endif"
                                        >
                                            {{ $transaksi->status }}
                                        </span>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="text-center py-10 text-gray-500"
                                    >
                                        Belum ada data transaksi
                                        pada periode tersebut.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        PRINT STYLE
    ====================================================== --}}

    <style>

        @media print {

            .cleanwash-sidebar {
                display: none !important;
            }

            body {
                background: white !important;
            }

            .cleanwash-dashboard {
                margin: 0 !important;
            }

            button,
            a {
                display: none !important;
            }

        }

    </style>

</x-app-layout>
