<x-app-layout>

    <x-slot name="header">

        <div>
            <p class="text-xs font-semibold tracking-widest uppercase"
               style="color: #4c9aca;">
                CLEANWASH
            </p>

            <h2 class="mt-1 text-xl font-bold text-gray-800">
                Tambah Pelanggan
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- CARD FORM --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- HEADER FORM --}}
                <div
                    class="border-b px-6 py-5"
                    style="
                        border-color: #edf3f7;
                        background: linear-gradient(100deg, #f3faff, #ffffff);
                    "
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl"
                            style="
                                background-color: #e8f5ff;
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
                                    d="M18 20a6 6 0 00-12 0M12 12a4 4 0 100-8 4 4 0 000 8z"
                                />
                            </svg>

                        </div>


                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Informasi Pelanggan
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Masukkan data pelanggan baru ke dalam sistem CleanWash.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ISI FORM --}}
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
                                        Data belum dapat disimpan
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
                        action="{{ route('pelanggan.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- NAMA --}}
                        <div class="mb-6">

                            <label
                                for="nama"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Nama Pelanggan
                                <span style="color: #dc2626;">*</span>
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                value="{{ old('nama') }}"
                                placeholder="Contoh: Budi Santoso"
                                class="w-full rounded-xl border px-4 py-3 text-sm shadow-sm transition focus:ring-2"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                                required
                            >

                            <p class="mt-2 text-xs text-gray-400">
                                Masukkan nama lengkap pelanggan.
                            </p>

                        </div>


                        {{-- NOMOR HP --}}
                        <div class="mb-6">

                            <label
                                for="no_hp"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Nomor HP
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <div class="relative">

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
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a2 2 0 011.94 1.515l.58 2.32a2 2 0 01-.45 1.82L9.12 9.88a16.015 16.015 0 006 6l1.225-1.225a2 2 0 011.82-.45l2.32.58A2 2 0 0122 16.72V20a2 2 0 01-2 2h-1C9.163 22 2 14.837 2 6V5a2 2 0 012-2z"
                                        />
                                    </svg>

                                </div>


                                <input
                                    type="text"
                                    id="no_hp"
                                    name="no_hp"
                                    value="{{ old('no_hp') }}"
                                    placeholder="081234567890"
                                    class="w-full rounded-xl border py-3 pl-11 pr-4 text-sm shadow-sm transition focus:ring-2"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        outline: none;
                                    "
                                    required
                                >

                            </div>


                            <p class="mt-2 text-xs text-gray-400">
                                Nomor yang dapat dihubungi untuk informasi laundry.
                            </p>

                        </div>


                        {{-- ALAMAT --}}
                        <div class="mb-7">

                            <label
                                for="alamat"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Alamat
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <textarea
                                id="alamat"
                                name="alamat"
                                rows="4"
                                placeholder="Masukkan alamat lengkap pelanggan..."
                                class="w-full resize-none rounded-xl border px-4 py-3 text-sm shadow-sm transition focus:ring-2"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                                required
                            >{{ old('alamat') }}</textarea>


                            <p class="mt-2 text-xs text-gray-400">
                                Masukkan alamat lengkap pelanggan.
                            </p>

                        </div>


                        {{-- GARIS --}}
                        <div
                            class="mb-6 border-t"
                            style="border-color: #edf3f7;"
                        ></div>


                        {{-- BUTTON --}}
                        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                            {{-- BATAL --}}
                            <a
                                href="{{ route('pelanggan.index') }}"
                                class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-semibold"
                                style="
                                    background-color: #f3f4f6;
                                    color: #374151;
                                    text-decoration: none;
                                "
                            >
                                Batal
                            </a>


                            {{-- SIMPAN --}}
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold text-white transition"
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

                                Simpan Pelanggan

                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- INFO BAWAH --}}
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
                    Pastikan data pelanggan yang dimasukkan sudah benar sebelum disimpan.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>
