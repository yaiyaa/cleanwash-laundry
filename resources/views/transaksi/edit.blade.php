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
                Edit Transaksi Laundry
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
                    ← Kembali ke Transaksi
                </a>
            </div>


            {{-- CARD --}}
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

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl"
                            style="
                                background-color: #dff2ff;
                                color: #0f6fb5;
                            "
                        >
                            🧺
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-gray-800">
                                Perbarui Transaksi
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Ubah data transaksi dan status proses laundry.
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

                            <p class="text-sm font-bold">
                                Data belum dapat diperbarui
                            </p>

                            <ul class="mt-2 list-disc pl-5 text-xs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                    @endif


                    <form
                        action="{{ route('transaksi.update', $transaksi) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- NAMA PELANGGAN --}}
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
                                name="nama"
                                id="nama"
                                value="{{ old('nama', $transaksi->pelanggan->nama) }}"
                                placeholder="Contoh: Budi Santoso"
                                required
                                class="w-full rounded-xl border px-4 py-3 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

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

                            <input
                                type="text"
                                name="no_hp"
                                id="no_hp"
                                value="{{ old('no_hp', $transaksi->pelanggan->no_hp) }}"
                                placeholder="081234567890"
                                required
                                class="w-full rounded-xl border px-4 py-3 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

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
                                    -- Pilih Paket --
                                </option>

                                @foreach ($pakets as $paket)

                                    <option
                                        value="{{ $paket->id }}"
                                        data-harga="{{ $paket->harga_per_kg }}"
                                        data-setrika="{{ $paket->menggunakan_setrika ? '1' : '0' }}"
                                        data-estimasi="{{ $paket->estimasi_hari }}"
                                        {{ old('paket_id', $transaksi->paket_id) == $paket->id ? 'selected' : '' }}
                                    >
                                        {{ $paket->nama_paket }}
                                    </option>

                                @endforeach

                            </select>

                            <p
                                class="mt-2 text-xs"
                                style="color: #6b8193;"
                            >
                                Status laundry akan menyesuaikan jenis paket.
                            </p>

                        </div>


                        {{-- HARGA + BERAT --}}
                        <div
                            class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2"
                        >

                            {{-- HARGA --}}
                            <div>

                                <label
                                    for="harga_per_kg"
                                    class="mb-2 block text-sm font-semibold text-gray-700"
                                >
                                    Harga per Kg
                                </label>

                                <input
                                    type="text"
                                    id="harga_per_kg"
                                    readonly
                                    class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        background-color: #f8fbfd;
                                        outline: none;
                                    "
                                >

                            </div>


                            {{-- BERAT --}}
                            <div>

                                <label
                                    for="berat"
                                    class="mb-2 block text-sm font-semibold text-gray-700"
                                >
                                    Berat (Kg)
                                    <span style="color: #dc2626;">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="berat"
                                    id="berat"
                                    value="{{ old('berat', $transaksi->berat) }}"
                                    min="0.1"
                                    step="0.1"
                                    placeholder="Contoh: 5"
                                    required
                                    class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                    style="
                                        border-color: #dcecf7;
                                        color: #183b56;
                                        outline: none;
                                    "
                                >

                            </div>

                        </div>


                        {{-- TOTAL HARGA --}}
                        <div class="mb-6">

                            <label
                                for="total_harga"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Total Harga
                            </label>

                            <input
                                type="text"
                                id="total_harga"
                                readonly
                                class="w-full rounded-xl border py-3 px-4 text-sm font-bold shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #0f6fb5;
                                    background-color: #f3faff;
                                    outline: none;
                                "
                            >

                        </div>


                        {{-- TANGGAL --}}
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
                                value="{{ old('tanggal_masuk', $transaksi->tanggal_masuk->format('Y-m-d')) }}"
                                required
                                class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >

                        </div>


                        {{-- STATUS --}}
                        <div class="mb-7">

                            <label
                                for="status"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Status Laundry
                                <span style="color: #dc2626;">*</span>
                            </label>

                            <select
                                name="status"
                                id="status"
                                required
                                class="w-full rounded-xl border py-3 px-4 text-sm shadow-sm"
                                style="
                                    border-color: #dcecf7;
                                    color: #183b56;
                                    outline: none;
                                "
                            >
                            </select>

                            <p
                                id="statusInfo"
                                class="mt-2 text-xs"
                                style="color: #6b8193;"
                            ></p>

                        </div>


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
                                ✓ Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- INFO --}}
            <div
                class="mt-5 rounded-xl border px-4 py-4"
                style="
                    background-color: #f3faff;
                    border-color: #dcecf7;
                "
            >

                <p
                    class="text-xs font-semibold"
                    style="color: #0f6fb5;"
                >
                    💡 Alur Status Laundry
                </p>

                <p
                    id="alurStatus"
                    class="mt-1 text-xs"
                    style="color: #6b8193;"
                ></p>

            </div>

        </div>

    </div>


    <script>

        const paketSelect = document.getElementById('paket_id');
        const beratInput = document.getElementById('berat');
        const hargaInput = document.getElementById('harga_per_kg');
        const totalInput = document.getElementById('total_harga');
        const statusSelect = document.getElementById('status');
        const statusInfo = document.getElementById('statusInfo');
        const alurStatus = document.getElementById('alurStatus');

        const statusSekarang = @json(old('status', $transaksi->status));

        function formatRupiah(angka) {
            return 'Rp ' + Number(angka).toLocaleString('id-ID');
        }

        function hitungTotal() {

            const selectedOption =
                paketSelect.options[paketSelect.selectedIndex];

            if (!selectedOption || !selectedOption.value) {
                hargaInput.value = '';
                totalInput.value = '';
                return;
            }

            const harga =
                parseFloat(selectedOption.dataset.harga) || 0;

            const berat =
                parseFloat(beratInput.value) || 0;

            hargaInput.value =
                harga > 0
                    ? formatRupiah(harga)
                    : '';

            const total = harga * berat;

            totalInput.value =
                total > 0
                    ? formatRupiah(total)
                    : '';
        }


        function updateStatusOptions() {

            const selectedOption =
                paketSelect.options[paketSelect.selectedIndex];

            if (!selectedOption || !selectedOption.value) {

                statusSelect.innerHTML =
                    '<option value="">-- Pilih status --</option>';

                statusInfo.textContent = '';
                alurStatus.textContent = '';

                return;
            }

            const menggunakanSetrika =
                selectedOption.dataset.setrika === '1';

            let statuses = [];

            if (menggunakanSetrika) {

                statuses = [
                    'Diterima',
                    'Dicuci',
                    'Disetrika',
                    'Selesai',
                    'Diambil'
                ];

                statusInfo.textContent =
                    'Paket ini menggunakan proses setrika.';

                alurStatus.textContent =
                    'Diterima → Dicuci → Disetrika → Selesai → Diambil';

            } else {

                statuses = [
                    'Diterima',
                    'Dicuci',
                    'Selesai',
                    'Diambil'
                ];

                statusInfo.textContent =
                    'Paket ini tidak menggunakan proses setrika.';

                alurStatus.textContent =
                    'Diterima → Dicuci → Selesai → Diambil';
            }


            const statusLama = statusSelect.value || statusSekarang;

            statusSelect.innerHTML = '';

            statuses.forEach(function(status) {

                const option =
                    document.createElement('option');

                option.value = status;
                option.textContent = status;

                if (status === statusLama) {
                    option.selected = true;
                }

                statusSelect.appendChild(option);

            });


            /*
             * Jika paket diganti dari paket setrika
             * ke paket tanpa setrika ketika status
             * masih Disetrika, ubah ke Dicuci.
             */

            if (
                !menggunakanSetrika &&
                statusSelect.value === 'Disetrika'
            ) {
                statusSelect.value = 'Dicuci';
            }

        }


        paketSelect.addEventListener(
            'change',
            function () {

                hitungTotal();
                updateStatusOptions();

            }
        );


        beratInput.addEventListener(
            'input',
            hitungTotal
        );


        hitungTotal();
        updateStatusOptions();

    </script>

</x-app-layout>
