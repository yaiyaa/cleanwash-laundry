<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - CleanWash</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen h-screen bg-[#f3faff] flex items-center justify-center p-4 overflow-hidden">

    <!-- MAIN CARD -->
    <div class="w-full max-w-7xl h-[calc(100vh-32px)] max-h-[780px] bg-white rounded-[32px] shadow-xl overflow-hidden flex">

        <!-- ================= LEFT SIDE ================= -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#1478bb] to-[#07558f] relative overflow-hidden">

            <!-- Background bubbles -->
            <div class="absolute -top-24 -left-24 w-80 h-80 bg-white/10 rounded-full"></div>

            <div class="absolute -bottom-24 -left-20 w-72 h-72 bg-white/10 rounded-full"></div>

            <div class="absolute top-28 right-20 w-14 h-14 bg-white/10 rounded-full"></div>

            <div class="absolute bottom-36 right-20 w-20 h-20 bg-white/10 rounded-full"></div>


            <div class="relative z-10 w-full px-14 py-12 flex flex-col">

                <!-- Logo -->
                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 bg-white/15 rounded-2xl flex items-center justify-center">

                        <svg
                            width="30"
                            height="30"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M12 2C12 2 5 9.2 5 14.2C5 18.5 8.13 22 12 22C15.87 22 19 18.5 19 14.2C19 9.2 12 2 12 2Z"
                                fill="white"
                            />

                            <path
                                d="M8.5 15.5C8.5 17.7 10.1 19.2 12.3 19.2"
                                stroke="#1478bb"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            />
                        </svg>

                    </div>

                    <span class="text-3xl font-bold text-white">
                        CleanWash
                    </span>

                </div>


                <!-- Heading -->
                <div class="mt-16">

                    <h1 class="text-4xl font-bold leading-tight text-white">

                        Laundry lebih mudah,
                        <br>

                        <span class="text-[#b9e3ff]">
                            lebih teratur.
                        </span>

                    </h1>

                    <p class="mt-7 max-w-lg text-lg leading-8 text-blue-50">
                        Kelola pelanggan, paket laundry, transaksi,
                        riwayat, dan laporan dalam satu sistem.
                    </p>

                </div>


                <!-- Washing Machine Illustration -->
                <div class="flex-1 flex items-center justify-center">

                    <div class="relative">

                        <!-- bubbles -->
                        <div class="absolute -top-8 -left-10 w-10 h-10 bg-white/30 rounded-full"></div>

                        <div class="absolute -top-2 -right-8 w-7 h-7 bg-white/25 rounded-full"></div>

                        <div class="absolute bottom-8 -left-16 w-6 h-6 bg-white/30 rounded-full"></div>

                        <div class="absolute bottom-16 -right-12 w-10 h-10 bg-white/20 rounded-full"></div>


                        <!-- machine -->
                        <div class="w-56 h-52 bg-white rounded-[28px] shadow-2xl flex flex-col items-center justify-center">

                            <!-- top controls -->
                            <div class="w-40 h-9 bg-[#e8f5ff] rounded-full flex items-center justify-between px-4 mb-4">

                                <div class="flex gap-2">

                                    <span class="w-3 h-3 rounded-full bg-[#0f6fb5]"></span>

                                    <span class="w-3 h-3 rounded-full bg-[#8fd0f0]"></span>

                                </div>

                                <div class="w-9 h-2 bg-[#acd9f1] rounded-full"></div>

                            </div>


                            <!-- washing circle -->
                            <div class="w-28 h-28 rounded-full border-[10px] border-[#c8e9fa] flex items-center justify-center">

                                <div class="w-20 h-20 rounded-full bg-[#1478bb] flex items-center justify-center">

                                    <svg
                                        width="32"
                                        height="32"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M12 4C12 4 7 9.5 7 13.5C7 16.54 9.24 19 12 19C14.76 19 17 16.54 17 13.5C17 9.5 12 4 12 4Z"
                                            fill="white"
                                        />
                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================= RIGHT SIDE ================= -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white">

            <div class="w-full max-w-[500px] px-12 py-7">

                <!-- Heading -->
                <div class="mb-5">

                    <p class="text-sm font-semibold text-[#0f6fb5]">
                        SELAMAT DATANG
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-[#183b56]">
                        Buat akun baru
                    </h2>

                    <p class="mt-2 text-base text-[#6b8193]">
                        Daftarkan akun untuk mulai menggunakan CleanWash.
                    </p>

                </div>


                <!-- FORM -->
                <form
                    method="POST"
                    action="{{ route('register') }}"
                    class="space-y-3"
                >

                    @csrf


                    <!-- NAME -->
                    <div>

                        <label
                            for="name"
                            class="block text-sm font-semibold text-[#183b56]"
                        >
                            Nama
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama"
                            class="mt-2 block w-full rounded-xl border-0 bg-white px-4 py-3 text-[#183b56] shadow-sm ring-1 ring-inset ring-[#e2edf4] focus:ring-2 focus:ring-inset focus:ring-[#0f6fb5]"
                        >

                        @if ($errors->get('name'))
                            <p class="mt-1 text-xs text-red-600">
                                {{ $errors->first('name') }}
                            </p>
                        @endif

                    </div>


                    <!-- EMAIL -->
                    <div>

                        <label
                            for="email"
                            class="block text-sm font-semibold text-[#183b56]"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="Masukkan email"
                            class="mt-2 block w-full rounded-xl border-0 bg-white px-4 py-3 text-[#183b56] shadow-sm ring-1 ring-inset ring-[#e2edf4] focus:ring-2 focus:ring-inset focus:ring-[#0f6fb5]"
                        >

                        @if ($errors->get('email'))
                            <p class="mt-1 text-xs text-red-600">
                                {{ $errors->first('email') }}
                            </p>
                        @endif

                    </div>


                    <!-- PASSWORD -->
                    <div>

                        <label
                            for="password"
                            class="block text-sm font-semibold text-[#183b56]"
                        >
                            Password
                        </label>

                        <div class="relative mt-2">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Masukkan password"
                                class="block w-full rounded-xl border-0 bg-white px-4 py-3 pr-12 text-[#183b56] shadow-sm ring-1 ring-inset ring-[#e2edf4] focus:ring-2 focus:ring-inset focus:ring-[#0f6fb5]"
                            >

                            <button
                                type="button"
                                onclick="togglePassword(
                                    'password',
                                    'eyeClosedPassword',
                                    'eyeOpenPassword'
                                )"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-[#6b8193] hover:text-[#0f6fb5]"
                            >

                                <!-- eye closed -->
                                <svg
                                    id="eyeClosedPassword"
                                    width="20"
                                    height="20"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 3l18 18M10.58 10.58a2 2 0 002.83 2.83M9.88 4.24A10.94 10.94 0 0112 4c5.5 0 9.5 5.5 9.5 5.5a18.12 18.12 0 01-3.07 3.49M6.23 6.23C3.87 7.82 2.5 10 2.5 10S6.5 16 12 16c1.18 0 2.28-.2 3.27-.55"
                                    />
                                </svg>


                                <!-- eye open -->
                                <svg
                                    id="eyeOpenPassword"
                                    width="20"
                                    height="20"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    class="hidden"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.5 12S6.5 5 12 5s9.5 7 9.5 7-4 7-9.5 7-9.5-7-9.5-7z"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="3"
                                    />
                                </svg>

                            </button>

                        </div>

                        @if ($errors->get('password'))
                            <p class="mt-1 text-xs text-red-600">
                                {{ $errors->first('password') }}
                            </p>
                        @endif

                    </div>


                    <!-- CONFIRM PASSWORD -->
                    <div>

                        <label
                            for="password_confirmation"
                            class="block text-sm font-semibold text-[#183b56]"
                        >
                            Konfirmasi Password
                        </label>

                        <div class="relative mt-2">

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Ulangi password"
                                class="block w-full rounded-xl border-0 bg-white px-4 py-3 pr-12 text-[#183b56] shadow-sm ring-1 ring-inset ring-[#e2edf4] focus:ring-2 focus:ring-inset focus:ring-[#0f6fb5]"
                            >

                            <button
                                type="button"
                                onclick="togglePassword(
                                    'password_confirmation',
                                    'eyeClosedConfirmation',
                                    'eyeOpenConfirmation'
                                )"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-[#6b8193] hover:text-[#0f6fb5]"
                            >

                                <!-- eye closed -->
                                <svg
                                    id="eyeClosedConfirmation"
                                    width="20"
                                    height="20"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 3l18 18M10.58 10.58a2 2 0 002.83 2.83M9.88 4.24A10.94 10.94 0 0112 4c5.5 0 9.5 5.5 9.5 5.5a18.12 18.12 0 01-3.07 3.49M6.23 6.23C3.87 7.82 2.5 10 2.5 10S6.5 16 12 16c1.18 0 2.28-.2 3.27-.55"
                                    />
                                </svg>


                                <!-- eye open -->
                                <svg
                                    id="eyeOpenConfirmation"
                                    width="20"
                                    height="20"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    class="hidden"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.5 12S6.5 5 12 5s9.5 7 9.5 7-4 7-9.5 7-9.5-7-9.5-7z"
                                    />

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="3"
                                    />
                                </svg>

                            </button>

                        </div>

                        @if ($errors->get('password_confirmation'))
                            <p class="mt-1 text-xs text-red-600">
                                {{ $errors->first('password_confirmation') }}
                            </p>
                        @endif

                    </div>


                    <!-- REGISTER BUTTON -->
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#1478bb] py-3.5 text-base font-semibold text-white shadow-md shadow-blue-200 hover:bg-[#07558f] transition"
                    >
                        Daftar
                    </button>


                    <!-- LOGIN -->
                    <div class="text-center pt-2">

                        <span class="text-sm text-[#6b8193]">
                            Sudah punya akun?
                        </span>

                        <a
                            href="{{ route('login') }}"
                            class="ml-1 text-sm font-semibold text-[#0f6fb5] hover:text-[#07558f]"
                        >
                            Masuk
                        </a>

                    </div>

                </form>


                <!-- FOOTER -->
                <div class="mt-4 pt-3 border-t border-[#e2edf4] text-center">

                    <p class="text-sm text-[#6b8193]">
                        Sistem Informasi Manajemen Laundry
                    </p>

                    <p class="mt-1 text-xs text-[#8ca1b2]">
                        © {{ date('Y') }} CleanWash
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- PASSWORD SCRIPT -->
    <script>
        function togglePassword(inputId, closedId, openId) {

            const input = document.getElementById(inputId);
            const closed = document.getElementById(closedId);
            const open = document.getElementById(openId);

            if (input.type === 'password') {

                input.type = 'text';

                closed.classList.add('hidden');
                open.classList.remove('hidden');

            } else {

                input.type = 'password';

                open.classList.add('hidden');
                closed.classList.remove('hidden');

            }
        }
    </script>

</body>

</html>
