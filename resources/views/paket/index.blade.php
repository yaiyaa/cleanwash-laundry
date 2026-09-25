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
                Paket Laundry
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
                    style="
                        background: linear-gradient(110deg, #e8f5ff, #ffffff);
                    "
                >

                    {{-- BUBBLE DEKORASI --}}
                    <div
                        class="absolute -right-8 -top-12 h-36 w-36 rounded-full"
                        style="background-color: rgba(15,111,181,0.07);"
                    ></div>

                    <div
                        class="absolute right-36 bottom-[-35px] h-24 w-24 rounded-full"
                        style="background-color: rgba(76,154,202,0.06);"
                    ></div>


                    <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            {{-- ICON --}}
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl"
                                style="
                                    background-color: #dff2ff;
                                    color: #0f6fb5;
                                "
                            >

                                <svg
                                    width="28"
                                    height="28"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 4h10M6 8h12M5 12h14M7 16h10M9 20h6"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                        stroke-width="0"
                                        fill="currentColor"
                                        opacity="0.08"
                                    />
                                </svg>

                            </div>


                            <div>

                                <p
                                    class="text-xs font-semibold uppercase tracking-wider"
                                    style="color: #5c8aa5;"
                                >
                                    Kelola Layanan
                                </p>

                                <h1 class="mt-1 text-2xl font-bold text-gray-800">
                                    Paket Laundry
                                </h1>

                                <p class="mt-1 text-sm text-gray-500">
                                    Kelola jenis layanan dan harga laundry CleanWash.
                                </p>

                            </div>

                        </div>


                        {{-- BUTTON TAMBAH --}}
                        <a
                            href="{{ route('paket.create') }}"
                            class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold"
                            style="
                                background-color: #0f6fb5;
                                color: white;
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

                            Tambah Paket

                        </a>

                    </div>

                </div>

            </div>


            {{-- CARD DATA --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- TOOLBAR --}}
                <div
                    class="flex flex-col gap-4 border-b px-6 py-5 sm:flex-row sm:items-center sm:justify-between"
                    style="border-color: #edf3f7;"
                >

                    <div>

                        <h3 class="text-base font-bold text-gray-800">
                            Daftar Paket
                        </h3>

                        <p class="mt-1 text-xs text-gray-400">
                            Paket yang tersedia di CleanWash.
                        </p>

                    </div>


                    {{-- SEARCH --}}
                    <div class="relative w-full sm:w-72">

                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                            style="color: #7ca6bd;"
                        >

                            <svg
                                width="17"
                                height="17"
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
                                    d="M20 20l-3.5-3.5"
                                />
                            </svg>

                        </div>


                        <input
                            type="text"
                            id="searchPaket"
                            placeholder="Cari paket..."
                            class="w-full rounded-xl border py-2.5 pl-10 pr-4 text-sm"
                            style="
                                border-color: #dcecf7;
                                outline: none;
                            "
                        >

                    </div>

                </div>


                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table
                        class="w-full text-left"
                        id="tabelPaket"
                    >

                        <thead
                            style="background-color: #f8fcff;"
                        >

                            <tr>

                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-400"
                                >
                                    No
                                </th>

                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-400"
                                >
                                    Paket Laundry
                                </th>

                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-400"
                                >
                                    Harga / Kg
                                </th>

                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-gray-400"
                                >
                                    Estimasi
                                </th>

                                <th
                                    class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wide text-gray-400"
                                >
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse ($pakets as $paket)

                                <tr
                                    class="paket-row border-t transition hover:bg-blue-50/30"
                                    style="border-color: #edf3f7;"
                                >

                                    {{-- NO --}}
                                    <td class="px-6 py-4 text-sm text-gray-400">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- NAMA --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl font-bold"
                                                style="
                                                    background-color: #e8f5ff;
                                                    color: #0f6fb5;
                                                "
                                            >
                                                🧺
                                            </div>


                                            <div>

                                                <p class="font-semibold text-gray-800">
                                                    {{ $paket->nama_paket }}
                                                </p>

                                                <p class="text-xs text-gray-400">
                                                    Paket layanan CleanWash
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- HARGA --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="inline-flex rounded-lg px-3 py-1.5 text-sm font-bold"
                                            style="
                                                background-color: #eef8ff;
                                                color: #0f6fb5;
                                            "
                                        >
                                            Rp {{ number_format($paket->harga_per_kg, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    {{-- ESTIMASI --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="inline-flex items-center rounded-lg px-3 py-1.5 text-xs font-semibold"
                                            style="
                                                background-color: #f3faff;
                                                color: #52778e;
                                            "
                                        >

                                            {{ $paket->estimasi_hari }} hari

                                        </span>

                                    </td>


                                    {{-- AKSI --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- DETAIL --}}
                                            <a
                                                href="{{ route('paket.show', $paket) }}"
                                                title="Detail"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg"
                                                style="
                                                    background-color: #f3faff;
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
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    />
                                                </svg>

                                            </a>


                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('paket.edit', $paket) }}"
                                                title="Edit"
                                                class="flex h-9 w-9 items-center justify-center rounded-lg"
                                                style="
                                                    background-color: #fff8eb;
                                                    color: #d97706;
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


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('paket.destroy', $paket) }}"
                                                method="POST"
                                                class="inline"
                                                data-confirm="Yakin ingin menghapus paket ini?"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Hapus"
                                                    class="flex h-9 w-9 items-center justify-center rounded-lg"
                                                    style="
                                                        background-color: #fff5f5;
                                                        color: #dc2626;
                                                        border: none;
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
                                                            d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14H6L5 6M10 11v5M14 11v5"
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
                                        class="px-6 py-16 text-center"
                                    >

                                        <div
                                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl"
                                            style="
                                                background-color: #e8f5ff;
                                                color: #0f6fb5;
                                            "
                                        >
                                            🧺
                                        </div>

                                        <h3 class="mt-4 text-base font-bold text-gray-700">
                                            Belum ada paket laundry
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-400">
                                            Tambahkan paket laundry pertama untuk CleanWash.
                                        </p>

                                        <a
                                            href="{{ route('paket.create') }}"
                                            class="mt-5 inline-flex items-center rounded-xl px-5 py-2.5 text-sm font-bold"
                                            style="
                                                background-color: #0f6fb5;
                                                color: white;
                                                text-decoration: none;
                                            "
                                        >
                                            + Tambah Paket
                                        </a>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- FOOTER --}}
                @if ($pakets->count() > 0)

                    <div
                        class="border-t px-6 py-4"
                        style="border-color: #edf3f7;"
                    >

                        <p class="text-xs text-gray-400">
                            Menampilkan
                            <span class="font-bold text-gray-600">
                                {{ $pakets->count() }}
                            </span>
                            paket laundry.
                        </p>

                    </div>

                @endif

            </div>


            {{-- INFO --}}
            <div
                class="mt-5 flex items-center gap-3 rounded-xl border px-4 py-3"
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

                <p class="text-xs text-gray-500">
                    Harga paket digunakan otomatis saat membuat transaksi laundry.
                </p>

            </div>

        </div>

    </div>


    {{-- SEARCH JAVASCRIPT --}}
    <script>

        const searchPaket = document.getElementById('searchPaket');

        if (searchPaket) {

            searchPaket.addEventListener('input', function () {

                const keyword = this.value.toLowerCase();

                const rows = document.querySelectorAll('.paket-row');

                rows.forEach(function (row) {

                    const text = row.textContent.toLowerCase();

                    row.style.display =
                        text.includes(keyword) ? '' : 'none';

                });

            });

        }

    </script>

</x-app-layout>
