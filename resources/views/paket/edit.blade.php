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
                Edit Paket Laundry
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

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


            {{-- CARD FORM --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- HEADER FORM --}}
                <div
                    class="border-b px-6 py-6 sm:px-7"
                    style="
                        border-color: #edf3f7;
                        background: linear-gradient(100deg, #e8f5ff, #ffffff);
                    "
                >

                    <div class="flex items-center gap-4">

                        {{-- ICON --}}
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl"
                            style="
                                background-color: #dff2ff;
                                color: #0f6fb5;
                            "
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
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                />
                            </svg>

                        </div>


                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Perbarui Paket
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Ubah informasi paket laundry sesuai kebutuhan.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <div class="p-6 sm:p-7">

                    {{-- ERROR --}}
                    @if ($errors->any())

                        <div
                            class="mb-6 rounded-xl border px-4 py-4"
                            style="
                                background-color: #fff5f5;
                                border-color: #fecaca;
                                color: #b91c1c;
                            "
                        >

                            <div class="flex gap-3">

                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full"
                                    style="background-color: #fee2e2;"
                                >
                                    !
                                </div>

                                <div>

                                    <p class="text-sm font-bold">
                                        Data belum dapat diperbarui
                                    </p>

                                    <ul class="mt-1 list-disc pl-5 text-xs">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                    <form
                        action="{{ route('paket.update', $paket) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- NAMA PAKET --}}
                        <div class="mb-6">

                            <label
                                for="nama_paket"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Nama Paket
                                <span style="color: #dc2626;">*</span>
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                    style="color: #7ca6bd;"
                                >

                                    <svg
                                        width="19"
                                        height="19"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 7H4a2 2 0 00-2 2v9a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"
                                        />
                                    </svg>

                                </div>


                                <input
                                    type="text"
                                    id="nama_paket"
                                    name="nama_paket"
                                    value="{{ old('nama_paket', $paket->nama_paket) }}"
                                    placeholder="Contoh: Cuci Kering"
                                    class="w-full rounded-xl border py-3 pl-11 pr-4 text-sm shadow-sm"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        outline: none;
                                    "
                                    required
                                >

                            </div>

                        </div>


                        {{-- HARGA --}}
                        <div class="mb-6">

                            <label
                                for="harga_per_kg"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Harga per Kg
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-sm font-semibold"
                                    style="color: #7ca6bd;"
                                >
                                    Rp
                                </div>


                                <input
                                    type="text"
                                    id="harga_per_kg"
                                    name="harga_per_kg"
                                    value="{{ old('harga_per_kg', $paket->harga_per_kg) }}"
                                    placeholder="Contoh: 7000"
                                    class="w-full rounded-xl border py-3 pl-12 pr-4 text-sm shadow-sm"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        outline: none;
                                    "
                                    required
                                >

                            </div>

                        </div>


                        {{-- ESTIMASI --}}
                        <div class="mb-7">

                            <label
                                for="estimasi_hari"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Estimasi Pengerjaan
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <div class="relative">

                                <input
                                    type="number"
                                    id="estimasi_hari"
                                    name="estimasi_hari"
                                    value="{{ old('estimasi_hari', $paket->estimasi_hari) }}"
                                    placeholder="Contoh: 2"
                                    min="1"
                                    class="w-full rounded-xl border py-3 pl-4 pr-20 text-sm shadow-sm"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        outline: none;
                                    "
                                    required
                                >


                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-sm font-medium"
                                    style="color: #7ca6bd;"
                                >
                                    hari
                                </div>

                            </div>

                        </div>


                        {{-- MENGGUNAKAN SETRIKA --}}
                        <div
                            class="mb-7 rounded-xl border p-4"
                            style="
                                background-color: #f3faff;
                                border-color: #dcecf7;
                            "
                        >

                            <label
                                for="menggunakan_setrika"
                                class="flex cursor-pointer items-start gap-3"
                            >

                                <input
                                    type="checkbox"
                                    id="menggunakan_setrika"
                                    name="menggunakan_setrika"
                                    value="1"
                                    {{ old('menggunakan_setrika', $paket->menggunakan_setrika) ? 'checked' : '' }}
                                    class="mt-1 h-4 w-4 rounded"
                                    style="accent-color: #0f6fb5;"
                                >

                                <div>

                                    <span
                                        class="block text-sm font-semibold"
                                        style="color: #183b56;"
                                    >
                                        Menggunakan Setrika
                                    </span>

                                    <span
                                        class="mt-1 block text-xs"
                                        style="color: #6b8193;"
                                    >
                                        Centang jika paket memiliki proses setrika.
                                        Contoh: Cuci Setrika dan Laundry Express.
                                    </span>

                                </div>

                            </label>

                        </div>


                        {{-- GARIS --}}
                        <div
                            class="mb-6 border-t"
                            style="border-color: #edf3f7;"
                        ></div>


                        {{-- BUTTON --}}
                        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                            <a
                                href="{{ route('paket.index') }}"
                                class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-semibold"
                                style="
                                    background-color: #f3f4f6;
                                    color: #374151;
                                    text-decoration: none;
                                "
                            >
                                Batal
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold text-white"
                                style="
                                    background-color: #0f6fb5;
                                    border: none;
                                    cursor: pointer;
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
                                        d="M5 12l4 4L19 6"
                                    />
                                </svg>

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

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
                    Perubahan harga paket akan digunakan pada transaksi baru.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>
