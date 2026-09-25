<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold tracking-widest text-blue-500 uppercase">
                    CleanWash
                </p>

                <h2 class="mt-1 text-xl font-bold text-gray-800">
                    Data Pelanggan
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =====================================================
                 NOTIFIKASI
            ====================================================== --}}

            @if (session('success'))

                <div
                    class="mb-6 flex items-center gap-3 rounded-xl border px-4 py-3"
                    style="background-color: #ecfdf5; border-color: #bbf7d0; color: #15803d;"
                >

                    <div
                        class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full"
                        style="background-color: #dcfce7;"
                    >
                        ✓
                    </div>

                    <div>
                        <p class="text-sm font-semibold">
                            Berhasil
                        </p>

                        <p class="text-sm">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>

            @endif


            {{-- =====================================================
                 HEADER CARD
            ====================================================== --}}

            <div
                class="mb-5 overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                <div class="p-6">

                    <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                        <div class="flex items-center gap-4">

                            {{-- Icon --}}
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl"
                                style="background-color: #e8f5ff; color: #0f6fb5;"
                            >

                                <svg
                                    width="25"
                                    height="25"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                                    />
                                </svg>

                            </div>


                            <div>

                                <h3 class="text-lg font-bold text-gray-800">
                                    Daftar Pelanggan
                                </h3>

                                <p class="mt-1 text-sm text-gray-500">
                                    Kelola informasi pelanggan CleanWash.
                                </p>

                            </div>

                        </div>


                        {{-- Tombol Tambah --}}
                        <a
                            href="{{ route('pelanggan.create') }}"
                            style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                background-color: #0f6fb5;
                                color: white;
                                padding: 10px 17px;
                                border-radius: 9px;
                                font-size: 13px;
                                font-weight: 700;
                                text-decoration: none;
                                box-shadow: 0 5px 14px rgba(15,111,181,0.18);
                            "
                        >
                            + Tambah Pelanggan
                        </a>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 TABEL
            ====================================================== --}}

            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- Header tabel --}}
                <div
                    class="flex flex-col gap-4 border-b p-5 sm:flex-row sm:items-center sm:justify-between"
                    style="border-color: #edf3f7;"
                >

                    <div>

                        <h3 class="text-sm font-bold text-gray-800">
                            Semua Pelanggan
                        </h3>

                        <p class="mt-1 text-xs text-gray-500">
                            Total {{ $pelanggans->count() }} pelanggan terdaftar
                        </p>

                    </div>


                    {{-- Pencarian --}}
                    <div class="relative w-full sm:w-72">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                            style="color: #8ba2b1;"
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
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"
                                />
                            </svg>

                        </div>

                        <input
                            type="text"
                            id="searchPelanggan"
                            placeholder="Cari pelanggan..."
                            class="w-full rounded-lg border py-2.5 pl-10 pr-4 text-sm focus:ring-2"
                            style="
                                border-color: #dcecf7;
                                color: #183b56;
                                outline: none;
                            "
                        >

                    </div>

                </div>


                {{-- Tabel --}}
                <div class="overflow-x-auto">

                    <table class="w-full" id="tabelPelanggan">

                        <thead>

                            <tr
                                style="
                                    background-color: #f5fbff;
                                    color: #557487;
                                "
                            >

                                <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide">
                                    No
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide">
                                    Pelanggan
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wide">
                                    No. HP
                                </th>

                                <th class="px-5 py-4 text-center text-xs font-bold uppercase tracking-wide">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($pelanggans as $pelanggan)

                                <tr
                                    class="pelanggan-row border-t transition"
                                    style="border-color: #edf3f7;"
                                >

                                    {{-- No --}}
                                    <td class="px-5 py-4 text-sm text-gray-500">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- Nama --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full font-bold"
                                                style="
                                                    background-color: #e8f5ff;
                                                    color: #0f6fb5;
                                                "
                                            >
                                                {{ strtoupper(substr($pelanggan->nama, 0, 1)) }}
                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-gray-800">
                                                    {{ $pelanggan->nama }}
                                                </p>

                                                <p class="text-xs text-gray-400">
                                                    Pelanggan CleanWash
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- No HP --}}
                                    <td class="px-5 py-4">

                                        <span
                                            class="rounded-lg px-3 py-1.5 text-xs font-semibold"
                                            style="
                                                background-color: #f3faff;
                                                color: #47748e;
                                            "
                                        >
                                            {{ $pelanggan->no_hp }}
                                        </span>

                                    </td>


                                    {{-- Aksi --}}
                                    <td class="px-5 py-4">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- Detail --}}
                                            <a
                                                href="{{ route('pelanggan.show', $pelanggan) }}"
                                                title="Lihat detail"
                                                style="
                                                    display: inline-flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    width: 36px;
                                                    height: 36px;
                                                    background-color: #e8f5ff;
                                                    color: #0f6fb5;
                                                    border-radius: 8px;
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
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    />
                                                </svg>

                                            </a>


                                            {{-- Edit --}}
                                            <a
                                                href="{{ route('pelanggan.edit', $pelanggan) }}"
                                                title="Edit pelanggan"
                                                style="
                                                    display: inline-flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    width: 36px;
                                                    height: 36px;
                                                    background-color: #f3f4f6;
                                                    color: #374151;
                                                    border-radius: 8px;
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
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                                    />
                                                </svg>

                                            </a>


                                            {{-- Hapus --}}
                                            <form
                                                action="{{ route('pelanggan.destroy', $pelanggan) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Hapus pelanggan"
                                                    style="
                                                        display: inline-flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        width: 36px;
                                                        height: 36px;
                                                        background-color: #fee2e2;
                                                        color: #dc2626;
                                                        border: none;
                                                        border-radius: 8px;
                                                        cursor: pointer;
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
                                                            d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 5v6m4-6v6m4-6v6"
                                                        />
                                                    </svg>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-5 py-14 text-center"
                                    >

                                        <div class="flex flex-col items-center">

                                            <div
                                                class="mb-4 flex h-16 w-16 items-center justify-center rounded-full"
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
                                                        stroke-width="1.8"
                                                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z"
                                                    />
                                                </svg>

                                            </div>

                                            <h3 class="text-sm font-bold text-gray-700">
                                                Belum Ada Pelanggan
                                            </h3>

                                            <p class="mt-1 text-xs text-gray-400">
                                                Tambahkan pelanggan pertama CleanWash.
                                            </p>

                                            <a
                                                href="{{ route('pelanggan.create') }}"
                                                class="mt-4"
                                                style="
                                                    display: inline-flex;
                                                    background-color: #0f6fb5;
                                                    color: white;
                                                    padding: 9px 15px;
                                                    border-radius: 8px;
                                                    font-size: 12px;
                                                    font-weight: 700;
                                                    text-decoration: none;
                                                "
                                            >
                                                + Tambah Pelanggan
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- =====================================================
                 FOOTER INFO
            ====================================================== --}}

            <div class="mt-5 flex items-center justify-between">

                <p class="text-xs text-gray-400">
                    CleanWash • Manajemen Laundry
                </p>

                <p class="text-xs font-medium" style="color: #70a8c5;">
                    {{ $pelanggans->count() }} Pelanggan
                </p>

            </div>

        </div>

    </div>


    {{-- =====================================================
         SEARCH JAVASCRIPT
    ====================================================== --}}

    <script>

        const searchInput = document.getElementById('searchPelanggan');

        const rows = document.querySelectorAll('.pelanggan-row');


        searchInput.addEventListener('input', function () {

            const keyword = this.value.toLowerCase().trim();


            rows.forEach(function (row) {

                const text = row.innerText.toLowerCase();

                if (text.includes(keyword)) {

                    row.style.display = '';

                } else {

                    row.style.display = 'none';

                }

            });

        });

    </script>

</x-app-layout>
