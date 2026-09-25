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
                Transaksi Laundry
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER HALAMAN --}}
            <div
                class="mb-6 overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                <div
                    class="relative overflow-hidden px-6 py-7 sm:px-8"
                    style="background: linear-gradient(110deg, #e8f5ff, #ffffff);"
                >

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

                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl"
                                style="background-color: #dff2ff; color: #0f6fb5;"
                            >

                                <svg
                                    width="27"
                                    height="27"
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
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7h8M8 11h8M8 15h5"
                                    />
                                </svg>

                            </div>

                            <div>

                                <p
                                    class="text-xs font-semibold uppercase tracking-wider"
                                    style="color: #5c8aa5;"
                                >
                                    Data Laundry
                                </p>

                                <h1 class="mt-1 text-2xl font-bold text-gray-800">
                                    Transaksi Laundry
                                </h1>

                                <p class="mt-1 text-sm text-gray-500">
                                    Kelola seluruh transaksi laundry CleanWash.
                                </p>

                            </div>

                        </div>


                        {{-- TAMBAH TRANSAKSI --}}
                        <a
                            href="{{ route('transaksi.create') }}"
                            class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold text-white"
                            style="
                                background-color: #0f6fb5;
                                text-decoration: none;
                                box-shadow: 0 5px 14px rgba(15,111,181,0.18);
                            "
                        >

                            <svg
                                width="18"
                                height="18"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                class="mr-2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 5v14M5 12h14"
                                />
                            </svg>

                            Tambah Transaksi

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD DATA --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- HEADER CARD --}}
                <div
                    class="border-b px-6 py-5"
                    style="border-color: #edf3f7;"
                >

                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Daftar Transaksi
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Data transaksi laundry yang tersimpan.
                            </p>

                        </div>


                        {{-- SEARCH --}}
                        <div class="relative w-full md:w-80">

                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                style="color: #7ca6bd;"
                            >

                                <svg
                                    width="18"
                                    height="18"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        cx="11"
                                        cy="11"
                                        r="7"
                                        stroke-width="2"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-width="2"
                                        d="M20 20l-4-4"
                                    />

                                </svg>

                            </div>


                            <input
                                type="text"
                                id="searchTransaksi"
                                placeholder="Cari pelanggan atau paket..."
                                class="w-full rounded-xl border py-3 pl-11 pr-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

                        </div>

                    </div>

                </div>


                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead>

                            <tr
                                style="
                                    background-color: #f3faff;
                                    color: #5c7890;
                                "
                            >

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    No
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Pelanggan
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Paket
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Berat
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Total Harga
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Tanggal Masuk
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Tanggal Selesai
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide">
                                    Status
                                </th>

                                <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase tracking-wide text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody id="transaksiTable">

                            @forelse ($transaksis as $transaksi)

                                <tr
                                    class="transaksi-row border-t transition hover:bg-gray-50"
                                    style="border-color: #edf3f7;"
                                >

                                    {{-- NO --}}
                                    <td class="px-5 py-4 text-sm font-semibold text-gray-500">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- PELANGGAN --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-sm font-bold"
                                                style="
                                                    background-color: #e8f5ff;
                                                    color: #0f6fb5;
                                                "
                                            >
                                                {{ strtoupper(substr($transaksi->pelanggan->nama, 0, 1)) }}
                                            </div>


                                            <div>

                                                <p class="pelanggan-name text-sm font-bold text-gray-800">
                                                    {{ $transaksi->pelanggan->nama }}
                                                </p>

                                                <p class="text-xs text-gray-400">
                                                    ID #{{ $transaksi->pelanggan->id }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- PAKET --}}
                                    <td class="px-5 py-4">

                                        <span
                                            class="paket-name inline-flex items-center rounded-lg px-3 py-1.5 text-xs font-semibold"
                                            style="
                                                background-color: #f0f7ff;
                                                color: #17689f;
                                            "
                                        >
                                            {{ $transaksi->paket->nama_paket }}
                                        </span>

                                    </td>


                                    {{-- BERAT --}}
                                    <td class="px-5 py-4">

                                        <span class="text-sm font-semibold text-gray-700">
                                            {{ $transaksi->berat }}
                                        </span>

                                        <span class="text-xs text-gray-400">
                                            Kg
                                        </span>

                                    </td>


                                    {{-- TOTAL --}}
                                    <td class="px-5 py-4">

                                        <span
                                            class="text-sm font-bold"
                                            style="color: #0f6fb5;"
                                        >
                                            Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    {{-- TANGGAL MASUK --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2">

                                            <svg
                                                width="16"
                                                height="16"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                                style="color: #7ca6bd;"
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

                                            <span class="text-sm text-gray-600">
                                                {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                                            </span>

                                        </div>

                                    </td>


                                    {{-- TANGGAL SELESAI --}}
                                    <td class="px-5 py-4">

                                        <span class="text-sm text-gray-600">

                                            {{ $transaksi->tanggal_selesai
                                                ? $transaksi->tanggal_selesai->format('d-m-Y')
                                                : '-' }}

                                        </span>

                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-5 py-4">

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


                                        <span
                                            class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-bold"
                                            style="
                                                background-color: {{ $statusStyle['background'] }};
                                                color: {{ $statusStyle['color'] }};
                                            "
                                        >

                                            <span
                                                class="mr-2 h-1.5 w-1.5 rounded-full"
                                                style="background-color: {{ $statusStyle['color'] }};"
                                            ></span>

                                            {{ $transaksi->status }}

                                        </span>

                                    </td>


                                    {{-- AKSI --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- STATUS BERIKUTNYA --}}
                                            @if ($transaksi->status === 'Selesai')
                                                <form
                                                    action="{{ route('transaksi.diambil', $transaksi) }}"
                                                    method="POST"
                                                    data-confirm="Tandai laundry ini sudah diambil pelanggan?"
                                                >
                                                    @csrf

                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-xs font-bold transition"
                                                        style="
                                                            background-color: #fff7ed;
                                                            color: #c2410c;
                                                            border: none;
                                                            cursor: pointer;
                                                        "
                                                    >
                                                        Diambil
                                                    </button>
                                                </form>
                                            @elseif ($transaksi->status !== 'Diambil')
                                                <form
                                                    action="{{ route('transaksi.selesai', $transaksi) }}"
                                                    method="POST"
                                                    data-confirm="Tandai laundry ini sebagai selesai dan kirim WhatsApp?"
                                                >
                                                    @csrf

                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-xs font-bold transition"
                                                        style="
                                                            background-color: #ecfdf5;
                                                            color: #15803d;
                                                            border: none;
                                                            cursor: pointer;
                                                        "
                                                    >
                                                        Selesai
                                                    </button>
                                                </form>
                                            @else
                                                <span
                                                    class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-xs font-bold"
                                                    style="background-color: #f3f4f6; color: #6b7280;"
                                                >
                                                    Diambil
                                                </span>
                                            @endif

                                            {{-- DETAIL --}}
                                            <a
                                                href="{{ route('transaksi.show', $transaksi) }}"
                                                title="Detail"
                                                class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-xs font-bold transition"
                                                style="
                                                    background-color: #e8f5ff;
                                                    color: #0f6fb5;
                                                    text-decoration: none;
                                                "
                                            >
                                                Detail
                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('transaksi.destroy', $transaksi) }}"
                                                method="POST"
                                                data-confirm="Yakin ingin menghapus transaksi ini?"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Hapus"
                                                    class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-xs font-bold transition"
                                                    style="
                                                        background-color: #fff5f5;
                                                        color: #dc2626;
                                                        border: none;
                                                        cursor: pointer;
                                                    "
                                                >

                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr id="emptyTransaksi">

                                    <td
                                        colspan="9"
                                        class="px-6 py-16 text-center"
                                    >

                                        <div class="flex flex-col items-center">

                                            <div
                                                class="flex h-16 w-16 items-center justify-center rounded-full"
                                                style="
                                                    background-color: #e8f5ff;
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


                                            <h4 class="mt-4 text-base font-bold text-gray-700">
                                                Belum Ada Transaksi
                                            </h4>

                                            <p class="mt-1 max-w-sm text-sm text-gray-400">
                                                Belum ada transaksi laundry yang tersimpan.
                                                Silakan tambahkan transaksi baru.
                                            </p>


                                            <a
                                                href="{{ route('transaksi.create') }}"
                                                class="mt-5 inline-flex items-center rounded-xl px-5 py-2.5 text-sm font-bold text-white"
                                                style="
                                                    background-color: #0f6fb5;
                                                    text-decoration: none;
                                                "
                                            >

                                                + Tambah Transaksi

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- FOOTER --}}
                @if ($transaksis->count() > 0)

                    <div
                        class="border-t px-6 py-4"
                        style="border-color: #edf3f7;"
                    >

                        <p class="text-xs text-gray-400">

                            Menampilkan
                            <span class="font-semibold text-gray-600">
                                {{ $transaksis->count() }}
                            </span>
                            transaksi laundry.

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- SEARCH SCRIPT --}}
    <script>

        const searchTransaksi = document.getElementById('searchTransaksi');

        const transaksiRows = document.querySelectorAll('.transaksi-row');


        if (searchTransaksi) {

            searchTransaksi.addEventListener('input', function () {

                const keyword = this.value.toLowerCase().trim();

                transaksiRows.forEach(function (row) {

                    const pelanggan = row
                        .querySelector('.pelanggan-name')
                        ?.textContent
                        .toLowerCase() || '';

                    const paket = row
                        .querySelector('.paket-name')
                        ?.textContent
                        .toLowerCase() || '';

                    if (
                        pelanggan.includes(keyword) ||
                        paket.includes(keyword)
                    ) {

                        row.style.display = '';

                    } else {

                        row.style.display = 'none';

                    }

                });

            });

        }

    </script>

</x-app-layout>
