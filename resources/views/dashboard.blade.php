<x-app-layout>

    {{-- =====================================================
         DASHBOARD CLEANWASH
    ====================================================== --}}

    <div class="cleanwash-dashboard">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            {{-- =================================================
                 HEADER / HERO
            ================================================== --}}

            <div class="cleanwash-hero">

                {{-- Bubble dekorasi --}}
                <div class="cleanwash-hero-bubble bubble-1"></div>
                <div class="cleanwash-hero-bubble bubble-2"></div>
                <div class="cleanwash-hero-bubble bubble-3"></div>

                <div class="cleanwash-hero-content">

                    <p class="cleanwash-hero-small">
                        SISTEM MANAJEMEN LAUNDRY
                    </p>

                    <h1>
                        Selamat Datang di
                        <span>CleanWash</span>
                    </h1>

                    <p class="cleanwash-hero-description">
                        Kelola data pelanggan, paket laundry,
                        dan transaksi dengan lebih mudah.
                    </p>

                    <a
                        href="{{ route('transaksi.create') }}"
                        class="cleanwash-hero-button"
                    >
                        + Buat Transaksi
                    </a>

                </div>


                {{-- Ilustrasi mesin cuci --}}
                <div class="cleanwash-washer">

                    <div class="washer-circle">

                        <div class="washer-door">

                            <div class="washer-inner">

                                <div class="washer-bubble bubble-a"></div>
                                <div class="washer-bubble bubble-b"></div>
                                <div class="washer-bubble bubble-c"></div>

                            </div>

                        </div>

                    </div>

                    <div class="washer-top"></div>

                    <div class="washer-base"></div>

                </div>

            </div>


            {{-- =================================================
                 STATISTIK
            ================================================== --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-6">


                {{-- Total Pelanggan --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon blue">

                        <svg
                            width="22"
                            height="22"
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

                        <p>
                            Total Pelanggan
                        </p>

                        <h3>
                            {{ $totalPelanggan }}
                        </h3>

                        <span>
                            Pelanggan terdaftar
                        </span>

                    </div>

                </div>



                {{-- Total Paket --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon purple">

                        <svg
                            width="22"
                            height="22"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3.27 6.96L12 12.01l8.73-5.05M12 22.08V12"
                            />

                        </svg>

                    </div>

                    <div>

                        <p>
                            Total Paket
                        </p>

                        <h3>
                            {{ $totalPaket }}
                        </h3>

                        <span>
                            Paket laundry tersedia
                        </span>

                    </div>

                </div>



                {{-- Transaksi Aktif --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon orange">

                        <svg
                            width="22"
                            height="22"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                            />

                        </svg>

                    </div>

                    <div>

                        <p>
                            Transaksi Aktif
                        </p>

                        <h3>
                            {{ $transaksiAktif }}
                        </h3>

                        <span>
                            Transaksi yang masih diproses
                        </span>

                    </div>

                </div>



                {{-- Transaksi Diambil --}}

                <div class="cleanwash-dashboard-stat">

                    <div class="cleanwash-stat-icon green">

                        <svg
                            width="22"
                            height="22"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />

                        </svg>

                    </div>

                    <div>

                        <p>
                            Transaksi Diambil
                        </p>

                        <h3>
                            {{ $transaksiDiambil }}
                        </h3>

                        <span>
                            Transaksi yang sudah diambil
                        </span>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 MENU CEPAT
            ================================================== --}}

            <div class="cleanwash-section-card mt-6">

                <div class="cleanwash-section-header">

                    <div>

                        <h2>
                            Menu Cepat
                        </h2>

                        <p>
                            Akses fitur CleanWash dengan mudah
                        </p>

                    </div>

                    <div class="cleanwash-section-bubble">
                        💧
                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">


                    {{-- Pelanggan --}}

                    <a
                        href="{{ route('pelanggan.index') }}"
                        class="cleanwash-quick-menu"
                    >

                        <div class="cleanwash-quick-icon blue">

                            <svg
                                width="24"
                                height="24"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z"
                                />

                            </svg>

                        </div>

                        <div>

                            <h3>
                                Data Pelanggan
                            </h3>

                            <p>
                                Kelola data pelanggan
                            </p>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>



                    {{-- Paket --}}

                    <a
                        href="{{ route('paket.index') }}"
                        class="cleanwash-quick-menu"
                    >

                        <div class="cleanwash-quick-icon purple">

                            <svg
                                width="24"
                                height="24"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"
                                />

                            </svg>

                        </div>

                        <div>

                            <h3>
                                Paket Laundry
                            </h3>

                            <p>
                                Kelola paket laundry
                            </p>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>



                    {{-- Transaksi --}}

                    <a
                        href="{{ route('transaksi.index') }}"
                        class="cleanwash-quick-menu"
                    >

                        <div class="cleanwash-quick-icon orange">

                            <svg
                                width="24"
                                height="24"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 14h6M9 18h6M9 6h6M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"
                                />

                            </svg>

                        </div>

                        <div>

                            <h3>
                                Transaksi Laundry
                            </h3>

                            <p>
                                Lihat dan kelola transaksi
                            </p>

                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>



            {{-- =================================================
                 INFORMASI STATUS
            ================================================== --}}

            <div class="cleanwash-info-card mt-6">

                <div class="cleanwash-info-icon">
                    💧
                </div>

                <div>

                    <h3>
                        Kelola Laundry Lebih Mudah
                    </h3>

                    <p>
                        Pantau transaksi dan status laundry pelanggan
                        melalui satu sistem yang sederhana dan terorganisir.
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
