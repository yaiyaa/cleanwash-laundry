<nav
    x-data="{ open: false }"
    class="cleanwash-sidebar"
>

    {{-- =====================================================
         LOGO
    ====================================================== --}}

    <div class="cleanwash-logo">

        <a
            href="{{ route('dashboard') }}"
            class="cleanwash-logo-link"
        >

            <div class="cleanwash-logo-icon">

                <svg
                    width="22"
                    height="22"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                >
                    <path
                        d="M12 2C12 2 5 9.2 5 14.5C5 18.64 8.13 22 12 22C15.87 22 19 18.64 19 14.5C19 9.2 12 2 12 2Z"
                    />
                </svg>

            </div>

            <span>
                CleanWash
            </span>

        </a>

    </div>


    {{-- =====================================================
         MENU
    ====================================================== --}}

    <div class="cleanwash-menu">


        {{-- =================================================
             DASHBOARD
        ================================================== --}}

        <a
            href="{{ route('dashboard') }}"
            class="cleanwash-menu-item
                {{ request()->routeIs('dashboard') ? 'active' : '' }}"
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
                    d="M3 12l9-9 9 9M5 10v10h14V10"
                />
            </svg>

            <span>
                Dashboard
            </span>

        </a>


        {{-- =================================================
             MASTER DATA
        ================================================== --}}

        <div class="cleanwash-menu-section">
            MASTER DATA
        </div>


        {{-- Pelanggan --}}

        <a
            href="{{ route('pelanggan.index') }}"
            class="cleanwash-menu-item
                {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
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
                    d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                />
            </svg>

            <span>
                Pelanggan
            </span>

        </a>


        {{-- Paket Laundry --}}

        <a
            href="{{ route('paket.index') }}"
            class="cleanwash-menu-item
                {{ request()->routeIs('paket.*') ? 'active' : '' }}"
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
                    d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3.27 6.96L12 12.01l8.73-5.05M12 22.08V12"
                />
            </svg>

            <span>
                Paket Laundry
            </span>

        </a>


        {{-- =================================================
             TRANSAKSI
        ================================================== --}}

        <div class="cleanwash-menu-section">
            TRANSAKSI
        </div>


        {{-- Transaksi Laundry --}}

        <a
            href="{{ route('transaksi.index') }}"
            class="cleanwash-menu-item
                {{ request()->routeIs('transaksi.index') ||
                   request()->routeIs('transaksi.create') ||
                   request()->routeIs('transaksi.edit') ||
                   request()->routeIs('transaksi.show')
                   ? 'active'
                   : '' }}"
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
                    d="M9 14h6M9 18h6M9 6h6M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"
                />

            </svg>

            <span>
                Transaksi Laundry
            </span>

        </a>


        {{-- Riwayat Transaksi --}}

        <a
            href="{{ route('transaksi.riwayat') }}"
            class="cleanwash-menu-item
                {{ request()->routeIs('transaksi.riwayat') ? 'active' : '' }}"
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
                    d="M3 12a9 9 0 1018 0 9 9 0 00-18 0z"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 7v5l3 2"
                />

            </svg>

            <span>
                Riwayat Transaksi
            </span>

        </a>


        {{-- =================================================
             OUTPUT
        ================================================== --}}

        <div class="cleanwash-menu-section">
            OUTPUT
        </div>


        {{-- Laporan Transaksi --}}

        <a
            href="{{ route('laporan.transaksi') }}"
            class="cleanwash-menu-item
                {{ request()->routeIs('laporan.*') ? 'active' : '' }}"
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
                    d="M6 2h9l5 5v15H6a2 2 0 01-2-2V4a2 2 0 012-2z"
                />

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M14 2v6h6M8 13h8M8 17h8"
                />

            </svg>

            <span>
                Laporan Transaksi
            </span>

        </a>

    </div>


    {{-- =====================================================
         USER
    ====================================================== --}}

    <div class="cleanwash-user">

        <div class="cleanwash-user-info">

            <div class="cleanwash-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div class="cleanwash-user-text">

                <p>
                    {{ Auth::user()->name }}
                </p>

                <span>

                </span>

            </div>

        </div>


        {{-- Profile --}}

        <a
            href="{{ route('profile.edit') }}"
            class="cleanwash-user-link"
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
                    d="M20 21a8 8 0 00-16 0M12 13a4 4 0 100-8 4 4 0 000 8z"
                />

            </svg>

            Profile

        </a>


        {{-- Logout --}}

        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="cleanwash-user-link cleanwash-logout"
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
                        d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"
                    />

                </svg>

                Logout

            </button>

        </form>

    </div>

</nav>
