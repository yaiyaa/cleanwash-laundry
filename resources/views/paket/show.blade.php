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
                Detail Paket Laundry
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- KEMBALI --}}
            <div class="mb-6">

                <a
                    href="{{ route('paket.index') }}"
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
                        class="mr-2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Kembali ke Paket Laundry

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
                        class="absolute right-28 bottom-[-25px] h-20 w-20 rounded-full"
                        style="background-color: rgba(76,154,202,0.07);"
                    ></div>


                    <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            {{-- ICON --}}
                            <div
                                class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl text-2xl"
                                style="
                                    background-color: #dff2ff;
                                    color: #0f6fb5;
                                "
                            >
                                🧺
                            </div>


                            <div>

                                <p
                                    class="text-xs font-semibold uppercase tracking-wider"
                                    style="color: #5c8aa5;"
                                >
                                    Paket Laundry
                                </p>

                                <h1 class="mt-1 text-2xl font-bold text-gray-800">
                                    {{ $paket->nama_paket }}
                                </h1>

                                <p class="mt-1 text-sm text-gray-500">
                                    Informasi lengkap paket CleanWash
                                </p>

                            </div>

                        </div>


                        {{-- EDIT --}}
                        <a
                            href="{{ route('paket.edit', $paket) }}"
                            class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold"
                            style="
                                background-color: #0f6fb5;
                                color: white;
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

                            Edit Paket

                        </a>

                    </div>

                </div>


                {{-- INFORMASI --}}
                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                        {{-- HARGA --}}
                        <div
                            class="rounded-xl border p-5"
                            style="
                                border-color: #dcecf7;
                                background-color: #fbfdff;
                            "
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
                                    style="
                                        background-color: #e8f5ff;
                                        color: #0f6fb5;
                                    "
                                >

                                    <span class="text-lg font-bold">
                                        Rp
                                    </span>

                                </div>


                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                        Harga per Kg
                                    </p>

                                    <p
                                        class="mt-1 text-xl font-bold"
                                        style="color: #0f6fb5;"
                                    >
                                        Rp {{ number_format($paket->harga_per_kg, 0, ',', '.') }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- ESTIMASI --}}
                        <div
                            class="rounded-xl border p-5"
                            style="
                                border-color: #dcecf7;
                                background-color: #fbfdff;
                            "
                        >

                            <div class="flex items-start gap-4">

                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
                                    style="
                                        background-color: #f0f7ff;
                                        color: #0f6fb5;
                                    "
                                >

                                    <svg
                                        width="22"
                                        height="22"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="9"
                                            stroke-width="2"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-width="2"
                                            d="M12 7v5l3 2"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                        Estimasi Pengerjaan
                                    </p>

                                    <p class="mt-1 text-xl font-bold text-gray-800">
                                        {{ $paket->estimasi_hari }}
                                        <span class="text-sm font-medium text-gray-500">
                                            hari
                                        </span>
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- ID PAKET --}}
                        <div
                            class="rounded-xl border p-5 md:col-span-2"
                            style="
                                border-color: #dcecf7;
                                background-color: #fbfdff;
                            "
                        >

                            <div class="flex items-center gap-4">

                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
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
                                            d="M9 12h6m-6 4h6M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                        ID Paket
                                    </p>

                                    <p class="mt-1 font-semibold text-gray-800">
                                        #{{ $paket->id }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- INFO --}}
                    <div
                        class="mt-6 flex items-start gap-3 rounded-xl border px-4 py-4"
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

                        <p class="text-xs leading-5 text-gray-500">
                            Harga paket ini akan digunakan sebagai dasar perhitungan
                            total biaya saat pelanggan melakukan transaksi laundry.
                        </p>

                    </div>

                </div>

            </div>


            {{-- KEMBALI --}}
            <div class="mt-5">

                <a
                    href="{{ route('paket.index') }}"
                    class="text-sm font-semibold"
                    style="
                        color: #6b8193;
                        text-decoration: none;
                    "
                >
                    ← Kembali ke daftar paket
                </a>

            </div>

        </div>

    </div>

</x-app-layout>
