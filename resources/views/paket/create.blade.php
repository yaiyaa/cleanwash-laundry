<x-app-layout>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div
                class="cleanwash-section-card mb-6"
                style="position: relative; overflow: hidden;"
            >
                <div style="position: relative; z-index: 2;">
                    <div
                        style="
                            color: #0f6fb5;
                            font-size: 13px;
                            font-weight: 700;
                            letter-spacing: 1px;
                            margin-bottom: 6px;
                        "
                    >
                        CLEANWASH
                    </div>

                    <h1
                        style="
                            color: #183b56;
                            font-size: 28px;
                            font-weight: 800;
                            margin: 0;
                        "
                    >
                        Tambah Paket Laundry
                    </h1>

                    <p
                        style="
                            color: #6b8193;
                            margin-top: 6px;
                            margin-bottom: 0;
                        "
                    >
                        Tambahkan paket laundry baru ke dalam sistem.
                    </p>
                </div>

                <div
                    style="
                        position: absolute;
                        width: 100px;
                        height: 100px;
                        border-radius: 50%;
                        background: #e8f5ff;
                        right: 30px;
                        top: -35px;
                    "
                ></div>

                <div
                    style="
                        position: absolute;
                        width: 55px;
                        height: 55px;
                        border-radius: 50%;
                        background: #f3faff;
                        right: 110px;
                        bottom: -25px;
                    "
                ></div>
            </div>

            {{-- Kembali --}}
            <div style="margin-bottom: 18px;">
                <a
                    href="{{ route('paket.index') }}"
                    style="
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                        color: #0f6fb5;
                        font-size: 14px;
                        font-weight: 600;
                        text-decoration: none;
                    "
                >
                    ← Kembali ke Paket Laundry
                </a>
            </div>

            {{-- Error --}}
            @if ($errors->any())
                <div
                    style="
                        background: #fef2f2;
                        border: 1px solid #fecaca;
                        color: #b91c1c;
                        border-radius: 12px;
                        padding: 14px 18px;
                        margin-bottom: 20px;
                    "
                >
                    <div style="font-weight: 700; margin-bottom: 6px;">
                        Terjadi kesalahan
                    </div>

                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <div
                class="cleanwash-section-card"
                style="padding: 28px;"
            >

                {{-- Judul --}}
                <div
                    style="
                        display: flex;
                        align-items: center;
                        gap: 12px;
                        margin-bottom: 25px;
                    "
                >
                    <div
                        style="
                            width: 45px;
                            height: 45px;
                            border-radius: 12px;
                            background: #e8f5ff;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 22px;
                        "
                    >
                        🧺
                    </div>

                    <div>
                        <h2
                            style="
                                margin: 0;
                                color: #183b56;
                                font-size: 20px;
                                font-weight: 800;
                            "
                        >
                            Informasi Paket
                        </h2>

                        <p
                            style="
                                margin: 3px 0 0;
                                color: #6b8193;
                                font-size: 13px;
                            "
                        >
                            Isi informasi paket laundry dengan lengkap.
                        </p>
                    </div>
                </div>

                <form
                    action="{{ route('paket.store') }}"
                    method="POST"
                >
                    @csrf

                    {{-- Nama Paket --}}
                    <div style="margin-bottom: 22px;">
                        <label
                            for="nama_paket"
                            style="
                                display: block;
                                color: #183b56;
                                font-size: 14px;
                                font-weight: 700;
                                margin-bottom: 8px;
                            "
                        >
                            Nama Paket
                        </label>

                        <input
                            type="text"
                            name="nama_paket"
                            id="nama_paket"
                            value="{{ old('nama_paket') }}"
                            placeholder="Contoh: Cuci Basah"
                            required
                            style="
                                width: 100%;
                                border: 1px solid #dcecf7;
                                border-radius: 10px;
                                padding: 11px 13px;
                                color: #183b56;
                                background: white;
                                outline: none;
                            "
                        >
                    </div>

                    {{-- Harga & Estimasi --}}
                    <div
                        style="
                            display: grid;
                            grid-template-columns: repeat(2, minmax(0, 1fr));
                            gap: 22px;
                            margin-bottom: 22px;
                        "
                    >

                        {{-- Harga --}}
                        <div>
                            <label
                                for="harga_per_kg"
                                style="
                                    display: block;
                                    color: #183b56;
                                    font-size: 14px;
                                    font-weight: 700;
                                    margin-bottom: 8px;
                                "
                            >
                                Harga per Kg
                            </label>

                            <input
                                type="text"
                                name="harga_per_kg"
                                id="harga_per_kg"
                                value="{{ old('harga_per_kg') }}"
                                placeholder="Contoh: 5000"
                                required
                                inputmode="decimal"
                                style="
                                    width: 100%;
                                    border: 1px solid #dcecf7;
                                    border-radius: 10px;
                                    padding: 11px 13px;
                                    color: #183b56;
                                    background: white;
                                    outline: none;
                                "
                            >

                            <p
                                style="
                                    margin-top: 6px;
                                    color: #6b8193;
                                    font-size: 12px;
                                "
                            >
                                Masukkan harga dalam rupiah per kilogram.
                            </p>
                        </div>

                        {{-- Estimasi --}}
                        <div>
                            <label
                                for="estimasi_hari"
                                style="
                                    display: block;
                                    color: #183b56;
                                    font-size: 14px;
                                    font-weight: 700;
                                    margin-bottom: 8px;
                                "
                            >
                                Estimasi Hari
                            </label>

                            <input
                                type="number"
                                name="estimasi_hari"
                                id="estimasi_hari"
                                value="{{ old('estimasi_hari') }}"
                                placeholder="Contoh: 2"
                                min="1"
                                required
                                style="
                                    width: 100%;
                                    border: 1px solid #dcecf7;
                                    border-radius: 10px;
                                    padding: 11px 13px;
                                    color: #183b56;
                                    background: white;
                                    outline: none;
                                "
                            >

                            <p
                                style="
                                    margin-top: 6px;
                                    color: #6b8193;
                                    font-size: 12px;
                                "
                            >
                                Berapa hari proses laundry diperkirakan selesai.
                            </p>
                        </div>

                    </div>

                    {{-- Menggunakan Setrika --}}
                    <div
                        style="
                            border: 1px solid #dcecf7;
                            background: #f3faff;
                            border-radius: 12px;
                            padding: 17px 18px;
                            margin-bottom: 22px;
                        "
                    >
                        <label
                            style="
                                display: flex;
                                align-items: flex-start;
                                gap: 12px;
                                cursor: pointer;
                            "
                        >
                            <input
                                type="checkbox"
                                name="menggunakan_setrika"
                                value="1"
                                {{ old('menggunakan_setrika') ? 'checked' : '' }}
                                style="
                                    width: 18px;
                                    height: 18px;
                                    margin-top: 2px;
                                    accent-color: #0f6fb5;
                                "
                            >

                            <span>
                                <span
                                    style="
                                        display: block;
                                        color: #183b56;
                                        font-size: 14px;
                                        font-weight: 700;
                                    "
                                >
                                    Menggunakan Setrika
                                </span>

                                <span
                                    style="
                                        display: block;
                                        color: #6b8193;
                                        font-size: 12px;
                                        margin-top: 4px;
                                        line-height: 1.5;
                                    "
                                >
                                    Centang jika paket memiliki proses setrika.
                                    Contoh: Cuci Setrika dan Laundry Express.
                                </span>
                            </span>
                        </label>
                    </div>

                    {{-- Informasi --}}
                    <div
                        style="
                            padding: 14px 16px;
                            background: #f3faff;
                            border: 1px solid #dcecf7;
                            border-radius: 10px;
                            color: #6b8193;
                            font-size: 13px;
                            line-height: 1.6;
                        "
                    >
                        <strong style="color: #0f6fb5;">
                            💡 Informasi:
                        </strong>
                        Paket yang tidak menggunakan setrika akan memiliki alur
                        Diterima → Dicuci → Selesai → Diambil.
                        Paket yang menggunakan setrika akan memiliki alur
                        Diterima → Dicuci → Disetrika → Selesai → Diambil.
                    </div>

                    {{-- Tombol --}}
                    <div
                        style="
                            display: flex;
                            justify-content: flex-end;
                            gap: 10px;
                            margin-top: 25px;
                            padding-top: 20px;
                            border-top: 1px solid #dcecf7;
                        "
                    >
                        <a
                            href="{{ route('paket.index') }}"
                            style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                padding: 11px 20px;
                                border-radius: 10px;
                                background: #f1f5f9;
                                color: #475569;
                                font-size: 14px;
                                font-weight: 700;
                                text-decoration: none;
                            "
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            style="
                                border: none;
                                cursor: pointer;
                                padding: 11px 22px;
                                border-radius: 10px;
                                background: #0f6fb5;
                                color: white;
                                font-size: 14px;
                                font-weight: 700;
                            "
                        >
                            Simpan Paket
                        </button>
                    </div>

                </form>
            </div>

            {{-- Footer --}}
            <div
                style="
                    margin-top: 18px;
                    text-align: center;
                    color: #6b8193;
                    font-size: 12px;
                "
            >
                CleanWash • Sistem Informasi Manajemen Laundry
            </div>

        </div>
    </div>

    {{-- Responsive --}}
    <style>
        @media (max-width: 700px) {
            .cleanwash-section-card > form > div:nth-child(2) {
                grid-template-columns: 1fr !important;
            }
        }
    </style>

</x-app-layout>
