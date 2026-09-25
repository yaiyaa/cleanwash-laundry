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
                Riwayat Transaksi
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER HALAMAN --}}
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h3 class="text-lg font-bold text-gray-800">
                        Riwayat Laundry
                    </h3>

                    <p
                        class="mt-1 text-sm"
                        style="color: #6b8193;"
                    >
                        Daftar transaksi laundry yang sudah diambil pelanggan.
                    </p>

                </div>


                {{-- KEMBALI --}}
                <a
                    href="{{ route('transaksi.index') }}"
                    class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-semibold"
                    style="
                        background-color: #e8f5ff;
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
                        class="mr-2"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />

                    </svg>

                    Transaksi Aktif

                </a>

            </div>


            {{-- CARD UTAMA --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- TOOLBAR --}}
                <div
                    class="border-b px-5 py-5 sm:px-6"
                    style="border-color: #edf3f7;"
                >

                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        {{-- JUDUL --}}
                        <div>

                            <div class="flex items-center gap-3">

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

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7h18M5 7v13h14V7M8 7V4h8v3"
                                        />

                                    </svg>

                                </div>


                                <div>

                                    <p class="text-sm font-bold text-gray-800">
                                        Transaksi Selesai
                                    </p>

                                    <p
                                        class="text-xs"
                                        style="color: #6b8193;"
                                    >
                                        Status transaksi: Diambil
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- SEARCH --}}
                        <div class="w-full lg:w-80">

                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                    style="color: #8aa2b3;"
                                >

                                    <svg
                                        width="18"
                                        height="18"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"
                                        />

                                    </svg>

                                </div>


                                <input
                                    type="text"
                                    id="searchRiwayat"
                                    placeholder="Cari pelanggan atau paket..."
                                    class="w-full rounded-xl border py-2.5 pl-10 pr-4 text-sm"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        outline: none;
                                    "
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- TABLE --}}
                @if ($transaksis->count() > 0)

                    <div class="overflow-x-auto">

                        <table
                            class="w-full min-w-[1100px] text-left"
                            id="tabelRiwayat"
                        >

                            <thead
                                style="background-color: #f8fbfd;"
                            >

                                <tr
                                    class="border-b"
                                    style="border-color: #edf3f7;"
                                >

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        No
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Pelanggan
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Paket
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Berat
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Total Harga
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Tanggal Masuk
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Selesai
                                    </th>

                                    <th class="px-5 py-4 text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Status
                                    </th>

                                    <th class="px-5 py-4 text-center text-xs font-bold uppercase tracking-wide text-gray-500">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-100">

                                @foreach ($transaksis as $transaksi)

                                    <tr
                                        class="transition hover:bg-blue-50/40"
                                        data-search="{{ strtolower(
                                            $transaksi->pelanggan->nama . ' ' .
                                            $transaksi->paket->nama_paket
                                        ) }}"
                                    >

                                        {{-- NO --}}
                                        <td class="px-5 py-4 text-sm font-semibold text-gray-500">
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- PELANGGAN --}}
                                        <td class="px-5 py-4">

                                            <p class="text-sm font-bold text-gray-800">
                                                {{ $transaksi->pelanggan->nama }}
                                            </p>

                                            <p
                                                class="mt-1 text-xs"
                                                style="color: #6b8193;"
                                            >
                                                {{ $transaksi->pelanggan->no_hp }}
                                            </p>

                                        </td>


                                        {{-- PAKET --}}
                                        <td class="px-5 py-4">

                                            <p class="text-sm font-semibold text-gray-700">
                                                {{ $transaksi->paket->nama_paket }}
                                            </p>

                                        </td>


                                        {{-- BERAT --}}
                                        <td class="px-5 py-4">

                                            <span class="text-sm font-semibold text-gray-700">
                                                {{ number_format($transaksi->berat, 1, ',', '.') }} Kg
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

                                            <span class="text-sm text-gray-600">
                                                {{ $transaksi->tanggal_masuk?->format('d M Y') ?? '-' }}
                                            </span>

                                        </td>


                                        {{-- TANGGAL SELESAI --}}
                                        <td class="px-5 py-4">

                                            <span class="text-sm text-gray-600">
                                                {{ $transaksi->tanggal_selesai?->format('d M Y') ?? '-' }}
                                            </span>

                                        </td>


                                        {{-- STATUS --}}
                                        <td class="px-5 py-4">

                                            <span
                                                class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold"
                                                style="
                                                    background-color: #f1f5f9;
                                                    color: #475569;
                                                "
                                            >

                                                <span
                                                    class="mr-2 h-1.5 w-1.5 rounded-full"
                                                    style="background-color: #64748b;"
                                                ></span>

                                                Diambil

                                            </span>

                                        </td>


                                        {{-- AKSI --}}
                                        <td class="px-5 py-4">

                                            <div class="flex justify-center">

                                                <a
                                                    href="{{ route('transaksi.show', $transaksi) }}"
                                                    class="inline-flex items-center justify-center rounded-lg px-3 py-2 text-xs font-bold"
                                                    style="
                                                        background-color: #e8f5ff;
                                                        color: #0f6fb5;
                                                        text-decoration: none;
                                                    "
                                                >

                                                    <svg
                                                        width="16"
                                                        height="16"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                        class="mr-1.5"
                                                    >

                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z"
                                                        />

                                                        <circle
                                                            cx="12"
                                                            cy="12"
                                                            r="2.5"
                                                        />

                                                    </svg>

                                                    Detail

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                    {{-- FOOTER --}}
                    <div
                        class="border-t px-5 py-4 sm:px-6"
                        style="border-color: #edf3f7;"
                    >

                        <div class="flex items-center justify-between">

                            <p
                                class="text-xs"
                                style="color: #6b8193;"
                                id="jumlahRiwayat"
                            >
                                Menampilkan {{ $transaksis->count() }} riwayat transaksi.
                            </p>


                            <span
                                class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold"
                                style="
                                    background-color: #f1f5f9;
                                    color: #475569;
                                "
                            >

                                {{ $transaksis->count() }} Transaksi

                            </span>

                        </div>

                    </div>

                @else

                    {{-- EMPTY STATE --}}
                    <div class="px-6 py-16 text-center">

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl"
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
                                    d="M3 7h18M5 7v13h14V7M8 7V4h8v3"
                                />

                            </svg>

                        </div>


                        <h3 class="mt-5 text-base font-bold text-gray-800">
                            Belum Ada Riwayat
                        </h3>


                        <p
                            class="mx-auto mt-2 max-w-md text-sm"
                            style="color: #6b8193;"
                        >
                            Transaksi yang sudah berstatus
                            <strong>Diambil</strong>
                            akan otomatis muncul di halaman riwayat ini.
                        </p>


                        <a
                            href="{{ route('transaksi.index') }}"
                            class="mt-5 inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold"
                            style="
                                background-color: #0f6fb5;
                                color: white;
                                text-decoration: none;
                            "
                        >
                            Lihat Transaksi
                        </a>

                    </div>

                @endif

            </div>


            {{-- INFO --}}
            <div
                class="mt-5 flex items-start gap-3 rounded-xl border px-4 py-4"
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


                <p
                    class="text-xs leading-relaxed"
                    style="color: #6b8193;"
                >
                    Riwayat hanya menampilkan transaksi yang sudah berstatus
                    <strong style="color: #183b56;">Diambil</strong>.
                    Data tetap tersimpan sehingga dapat dilihat kembali melalui
                    tombol <strong style="color: #183b56;">Detail</strong>.
                </p>

            </div>

        </div>

    </div>


    {{-- JAVASCRIPT SEARCH --}}
    <script>

        const searchRiwayat =
            document.getElementById('searchRiwayat');

        const tabelRiwayat =
            document.getElementById('tabelRiwayat');

        const jumlahRiwayat =
            document.getElementById('jumlahRiwayat');


        if (
            searchRiwayat &&
            tabelRiwayat
        ) {

            searchRiwayat.addEventListener(
                'input',
                function ()
                {
                    const keyword =
                        this.value
                            .toLowerCase()
                            .trim();


                    const rows =
                        tabelRiwayat.querySelectorAll('tbody tr');


                    let jumlahTampil = 0;


                    rows.forEach(
                        function (row)
                        {
                            const text =
                                row.dataset.search || '';


                            if (
                                text.includes(keyword)
                            ) {

                                row.style.display = '';

                                jumlahTampil++;

                            } else {

                                row.style.display = 'none';

                            }

                        }
                    );


                    if (jumlahRiwayat) {

                        jumlahRiwayat.textContent =
                            'Menampilkan ' +
                            jumlahTampil +
                            ' dari ' +
                            rows.length +
                            ' riwayat transaksi.';

                    }

                }
            );

        }

    </script>

</x-app-layout>
