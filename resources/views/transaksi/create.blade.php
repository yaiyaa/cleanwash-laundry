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
                Tambah Transaksi Laundry
            </h2>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

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
                        class="mr-2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Kembali ke Transaksi

                </a>

            </div>


            {{-- CARD FORM --}}
            <div
                class="overflow-hidden rounded-2xl border bg-white shadow-sm"
                style="border-color: #dcecf7;"
            >

                {{-- HEADER --}}
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


                        <div>

                            <h3 class="text-lg font-bold text-gray-800">
                                Transaksi Baru
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Masukkan data pelanggan dan layanan laundry.
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
                        action="{{ route('transaksi.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- PELANGGAN --}}
                        <div class="mb-6">

                            <label
                                for="pelanggan_id"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Pelanggan
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <select
                                name="pelanggan_id"
                                id="pelanggan_id"
                                required
                                class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

                                <option value="">
                                    -- Pilih Pelanggan --
                                </option>

                                @foreach ($pelanggans as $pelanggan)

                                    <option
                                        value="{{ $pelanggan->id }}"
                                        {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}
                                    >
                                        {{ $pelanggan->nama }}
                                        — {{ $pelanggan->no_hp }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- PAKET --}}
                        <div class="mb-6">

                            <label
                                for="paket_id"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Paket Laundry
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <select
                                name="paket_id"
                                id="paket_id"
                                required
                                class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

                                <option value="">
                                    -- Pilih Paket Laundry --
                                </option>

                                @foreach ($pakets as $paket)

                                    <option
                                        value="{{ $paket->id }}"
                                        data-harga="{{ $paket->harga_per_kg }}"
                                        data-estimasi="{{ $paket->estimasi_hari }}"
                                        data-setrika="{{ $paket->menggunakan_setrika ? '1' : '0' }}"
                                        {{ old('paket_id') == $paket->id ? 'selected' : '' }}
                                    >
                                        {{ $paket->nama_paket }}
                                        — Rp {{ number_format($paket->harga_per_kg, 0, ',', '.') }}/Kg
                                    </option>

                                @endforeach

                            </select>


                            <p
                                class="mt-2 text-xs"
                                style="color: #6b8193;"
                            >
                                Pilih paket sesuai layanan yang digunakan pelanggan.
                            </p>

                        </div>


                        {{-- INFORMASI PAKET --}}
                        <div
                            id="informasiPaket"
                            class="mb-6 rounded-xl border px-4 py-4"
                            style="
                                background-color: #f3faff;
                                border-color: #dcecf7;
                            "
                        >

                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

                                {{-- HARGA --}}
                                <div>

                                    <p
                                        class="text-xs"
                                        style="color: #6b8193;"
                                    >
                                        Harga per Kg
                                    </p>

                                    <p
                                        id="hargaPreview"
                                        class="mt-1 text-sm font-bold"
                                        style="color: #183b56;"
                                    >
                                        -
                                    </p>

                                </div>


                                {{-- ESTIMASI --}}
                                <div>

                                    <p
                                        class="text-xs"
                                        style="color: #6b8193;"
                                    >
                                        Estimasi
                                    </p>

                                    <p
                                        id="estimasiPreview"
                                        class="mt-1 text-sm font-bold"
                                        style="color: #183b56;"
                                    >
                                        -
                                    </p>

                                </div>


                                {{-- SETRIKA --}}
                                <div>

                                    <p
                                        class="text-xs"
                                        style="color: #6b8193;"
                                    >
                                        Proses Setrika
                                    </p>

                                    <p
                                        id="setrikaPreview"
                                        class="mt-1 text-sm font-bold"
                                        style="color: #183b56;"
                                    >
                                        -
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- BERAT --}}
                        <div class="mb-6">

                            <label
                                for="berat"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Berat Laundry (Kg)
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <input
                                type="number"
                                name="berat"
                                id="berat"
                                value="{{ old('berat') }}"
                                placeholder="Contoh: 5"
                                min="0.1"
                                step="0.1"
                                required
                                class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

                            <p
                                class="mt-2 text-xs"
                                style="color: #6b8193;"
                            >
                                Masukkan berat laundry dalam kilogram.
                            </p>

                        </div>


                        {{-- TOTAL HARGA --}}
                        <div class="mb-6">

                            <label
                                for="total_harga"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Total Harga
                            </label>


                            <div
                                class="rounded-xl border px-4 py-4"
                                style="
                                    background-color: #f3faff;
                                    border-color: #dcecf7;
                                "
                            >

                                <p
                                    id="totalHarga"
                                    class="text-2xl font-bold"
                                    style="color: #0f6fb5;"
                                >
                                    Rp 0
                                </p>

                                <p
                                    class="mt-1 text-xs"
                                    style="color: #6b8193;"
                                >
                                    Total dihitung otomatis berdasarkan berat × harga per Kg.
                                </p>

                            </div>

                        </div>


                        {{-- TANGGAL MASUK --}}
                        <div class="mb-6">

                            <label
                                for="tanggal_masuk"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Tanggal Masuk
                                <span style="color: #dc2626;">*</span>
                            </label>


                            <input
                                type="date"
                                name="tanggal_masuk"
                                id="tanggal_masuk"
                                value="{{ old('tanggal_masuk', date('Y-m-d')) }}"
                                required
                                class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

                        </div>


                        {{-- TANGGAL SELESAI --}}
                        <div class="mb-6">

                            <label
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Perkiraan Selesai
                            </label>


                            <div
                                class="rounded-xl border px-4 py-3"
                                style="
                                    background-color: #f8fbfd;
                                    border-color: #dcecf7;
                                "
                            >

                                <p
                                    id="tanggalSelesai"
                                    class="text-sm font-bold"
                                    style="color: #183b56;"
                                >
                                    -
                                </p>

                                <p
                                    class="mt-1 text-xs"
                                    style="color: #6b8193;"
                                >
                                    Tanggal dihitung berdasarkan tanggal masuk dan estimasi paket.
                                </p>

                            </div>

                        </div>


                        {{-- STATUS AWAL --}}
                        <div class="mb-6">

                            <label
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Status Awal
                            </label>


                            <div
                                class="flex items-center gap-3 rounded-xl border px-4 py-3"
                                style="
                                    background-color: #e8f5ff;
                                    border-color: #cfe8f8;
                                "
                            >

                                <span
                                    class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold"
                                    style="
                                        background-color: #dff2ff;
                                        color: #0f6fb5;
                                    "
                                >
                                    Diterima
                                </span>

                                <span
                                    class="text-xs"
                                    style="color: #6b8193;"
                                >
                                    Semua transaksi baru dimulai dari status Diterima.
                                </span>

                            </div>

                        </div>


                        {{-- ALUR STATUS --}}
                        <div class="mb-7">

                            <div
                                class="rounded-xl border px-4 py-4"
                                style="
                                    background-color: #f3faff;
                                    border-color: #dcecf7;
                                "
                            >

                                <p
                                    class="text-xs font-semibold"
                                    style="color: #0f6fb5;"
                                >
                                    💧 Alur Status Laundry
                                </p>


                                <p
                                    id="alurStatus"
                                    class="mt-2 text-sm font-bold"
                                    style="color: #183b56;"
                                >
                                    Pilih paket terlebih dahulu.
                                </p>


                                <p
                                    id="statusKeterangan"
                                    class="mt-2 text-xs"
                                    style="color: #6b8193;"
                                >
                                    Alur status akan menyesuaikan paket laundry.
                                </p>

                            </div>

                        </div>


                        {{-- GARIS --}}
                        <div
                            class="mb-6 border-t"
                            style="border-color: #edf3f7;"
                        ></div>


                        {{-- BUTTON --}}
                        <div
                            class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end"
                        >

                            <a
                                href="{{ route('transaksi.index') }}"
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

                                Simpan Transaksi

                            </button>

                        </div>

                    </form>

                </div>

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
                    Transaksi baru otomatis dimulai dari status
                    <strong style="color: #183b56;">Diterima</strong>.
                    Alur proses berikutnya akan mengikuti jenis paket laundry.
                </p>

            </div>

        </div>

    </div>


    {{-- JAVASCRIPT --}}
    <script>

        const paketSelect =
            document.getElementById('paket_id');

        const beratInput =
            document.getElementById('berat');

        const tanggalMasukInput =
            document.getElementById('tanggal_masuk');

        const hargaPreview =
            document.getElementById('hargaPreview');

        const estimasiPreview =
            document.getElementById('estimasiPreview');

        const setrikaPreview =
            document.getElementById('setrikaPreview');

        const totalHarga =
            document.getElementById('totalHarga');

        const tanggalSelesai =
            document.getElementById('tanggalSelesai');

        const alurStatus =
            document.getElementById('alurStatus');

        const statusKeterangan =
            document.getElementById('statusKeterangan');


        /*
        |--------------------------------------------------------------------------
        | Format Rupiah
        |--------------------------------------------------------------------------
        */

        function formatRupiah(angka)
        {
            return 'Rp ' +
                Number(angka).toLocaleString('id-ID');
        }


        /*
        |--------------------------------------------------------------------------
        | Format Tanggal Indonesia
        |--------------------------------------------------------------------------
        */

        function formatTanggalIndonesia(tanggal)
        {
            const tanggalObj =
                new Date(tanggal + 'T00:00:00');

            if (isNaN(tanggalObj.getTime())) {
                return '-';
            }

            return tanggalObj.toLocaleDateString(
                'id-ID',
                {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Hitung Total Harga
        |--------------------------------------------------------------------------
        */

        function hitungTotal()
        {
            const selectedOption =
                paketSelect.options[paketSelect.selectedIndex];


            if (
                !selectedOption ||
                !selectedOption.value
            ) {

                hargaPreview.textContent = '-';

                totalHarga.textContent = 'Rp 0';

                return;
            }


            const harga =
                parseFloat(
                    selectedOption.dataset.harga
                ) || 0;


            const berat =
                parseFloat(
                    beratInput.value
                ) || 0;


            hargaPreview.textContent =
                harga > 0
                    ? formatRupiah(harga)
                    : '-';


            const total =
                harga * berat;


            totalHarga.textContent =
                total > 0
                    ? formatRupiah(total)
                    : 'Rp 0';
        }


        /*
        |--------------------------------------------------------------------------
        | Tampilkan Informasi Paket
        |--------------------------------------------------------------------------
        */

        function tampilkanInformasiPaket()
        {
            const selectedOption =
                paketSelect.options[paketSelect.selectedIndex];


            if (
                !selectedOption ||
                !selectedOption.value
            ) {

                hargaPreview.textContent = '-';

                estimasiPreview.textContent = '-';

                setrikaPreview.textContent = '-';

                alurStatus.textContent =
                    'Pilih paket terlebih dahulu.';

                statusKeterangan.textContent =
                    'Alur status akan menyesuaikan paket laundry.';

                return;
            }


            const harga =
                parseFloat(
                    selectedOption.dataset.harga
                ) || 0;


            const estimasi =
                parseInt(
                    selectedOption.dataset.estimasi
                ) || 0;


            const menggunakanSetrika =
                selectedOption.dataset.setrika === '1';


            hargaPreview.textContent =
                harga > 0
                    ? formatRupiah(harga)
                    : '-';


            estimasiPreview.textContent =
                estimasi > 0
                    ? estimasi + ' hari'
                    : '-';


            if (menggunakanSetrika) {

                setrikaPreview.textContent =
                    'Ya';

                setrikaPreview.style.color =
                    '#0f6fb5';


                alurStatus.textContent =
                    'Diterima → Dicuci → Disetrika → Selesai → Diambil';


                statusKeterangan.textContent =
                    'Paket ini memiliki proses setrika.';

            } else {

                setrikaPreview.textContent =
                    'Tidak';

                setrikaPreview.style.color =
                    '#6b8193';


                alurStatus.textContent =
                    'Diterima → Dicuci → Selesai → Diambil';


                statusKeterangan.textContent =
                    'Paket ini tidak memiliki proses setrika.';
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Hitung Perkiraan Tanggal Selesai
        |--------------------------------------------------------------------------
        */

        function hitungTanggalSelesai()
        {
            const selectedOption =
                paketSelect.options[paketSelect.selectedIndex];


            if (
                !selectedOption ||
                !selectedOption.value ||
                !tanggalMasukInput.value
            ) {

                tanggalSelesai.textContent = '-';

                return;
            }


            const estimasi =
                parseInt(
                    selectedOption.dataset.estimasi
                ) || 0;


            if (estimasi <= 0) {

                tanggalSelesai.textContent = '-';

                return;
            }


            const tanggal =
                new Date(
                    tanggalMasukInput.value + 'T00:00:00'
                );


            tanggal.setDate(
                tanggal.getDate() + estimasi
            );


            const tahun =
                tanggal.getFullYear();

            const bulan =
                String(
                    tanggal.getMonth() + 1
                ).padStart(2, '0');

            const hari =
                String(
                    tanggal.getDate()
                ).padStart(2, '0');


            const hasil =
                `${tahun}-${bulan}-${hari}`;


            tanggalSelesai.textContent =
                formatTanggalIndonesia(hasil);
        }


        /*
        |--------------------------------------------------------------------------
        | Ketika Paket Berubah
        |--------------------------------------------------------------------------
        */

        paketSelect.addEventListener(
            'change',
            function ()
            {
                hitungTotal();

                tampilkanInformasiPaket();

                hitungTanggalSelesai();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Ketika Berat Berubah
        |--------------------------------------------------------------------------
        */

        beratInput.addEventListener(
            'input',
            function ()
            {
                hitungTotal();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Ketika Tanggal Masuk Berubah
        |--------------------------------------------------------------------------
        */

        tanggalMasukInput.addEventListener(
            'change',
            function ()
            {
                hitungTanggalSelesai();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Jalankan Saat Halaman Dibuka
        |--------------------------------------------------------------------------
        */

        hitungTotal();

        tampilkanInformasiPaket();

        hitungTanggalSelesai();

    </script>


</x-app-layout>
