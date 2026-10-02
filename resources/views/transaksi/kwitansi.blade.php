<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Kwitansi #{{ $transaksi->id }} - CleanWash
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            background: #f3faff;
            font-family: Arial, Helvetica, sans-serif;
            color: #183b56;
        }

        .receipt {
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            background: white;
            border: 1px solid #dcecf7;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(15, 111, 181, 0.08);
        }

        .header {
            text-align: center;
            padding-bottom: 18px;
            border-bottom: 1px dashed #c9dce8;
        }

        .logo {
            width: 52px;
            height: 52px;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: #e8f5ff;
            color: #0f6fb5;
            font-size: 25px;
        }

        .brand {
            margin: 0;
            font-size: 23px;
            font-weight: 800;
            color: #0f6fb5;
        }

        .subtitle {
            margin: 5px 0 0;
            font-size: 11px;
            color: #6b8193;
            letter-spacing: 0.5px;
        }

        .transaction {
            margin: 18px 0;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            font-size: 12px;
        }

        .transaction span:first-child {
            color: #6b8193;
        }

        .transaction strong {
            color: #183b56;
        }

        .section {
            padding: 16px 0;
            border-top: 1px dashed #c9dce8;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 11px;
            font-size: 13px;
        }

        .row:last-child {
            margin-bottom: 0;
        }

        .label {
            color: #6b8193;
        }

        .value {
            text-align: right;
            font-weight: 600;
            color: #183b56;
        }

        .total {
            margin-top: 5px;
            padding: 15px;
            border-radius: 12px;
            background: #f3faff;
            border: 1px solid #c9e7f8;
        }

        .total .row {
            margin: 0;
        }

        .total .label {
            font-weight: 700;
            color: #183b56;
        }

        .total .value {
            font-size: 18px;
            color: #0f6fb5;
        }

        .status {
            text-align: center;
            margin-top: 18px;
            padding: 9px 12px;
            border-radius: 999px;
            background: #e8f5ff;
            color: #0f6fb5;
            font-size: 12px;
            font-weight: 700;
        }

        .footer {
            text-align: center;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px dashed #c9dce8;
        }

        .footer p {
            margin: 4px 0;
            font-size: 11px;
            color: #6b8193;
        }

        .footer strong {
            color: #0f6fb5;
        }

        .actions {
            max-width: 420px;
            margin: 18px auto 0;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-print {
            background: #0f6fb5;
            color: white;
        }

        .btn-back {
            background: white;
            color: #374151;
            border: 1px solid #dcecf7;
        }

        @media print {
            body {
                padding: 0;
                background: white;
            }

            .receipt {
                max-width: 420px;
                margin: 0 auto;
                border: none;
                box-shadow: none;
                border-radius: 0;
            }

            .actions {
                display: none;
            }

            @page {
                margin: 10mm;
            }
        }
    </style>
</head>

<body>

    <div class="receipt">

        {{-- HEADER --}}
        <div class="header">

            <div class="logo">
                🧺
            </div>

            <h1 class="brand">
                CLEANWASH
            </h1>

            <p class="subtitle">
                Jl. Raya Kebon Jeruk No. 123, Medan Johor
            </p>

        </div>


        {{-- INFORMASI TRANSAKSI --}}
        <div class="transaction">

            <div>
                <span>No. Transaksi</span><br>
                <strong>
                    #{{ $transaksi->id }}
                </strong>
            </div>

            <div style="text-align: right;">
                <span>Tanggal</span><br>
                <strong>
                    {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                </strong>
            </div>

        </div>


        {{-- PELANGGAN --}}
        <div class="section">

            <div class="row">
                <span class="label">
                    Nama Pelanggan
                </span>

                <span class="value">
                    {{ $transaksi->pelanggan->nama }}
                </span>
            </div>

            <div class="row">
                <span class="label">
                    Nomor HP
                </span>

                <span class="value">
                    {{ $transaksi->pelanggan->no_hp }}
                </span>
            </div>

        </div>


        {{-- DETAIL LAUNDRY --}}
        <div class="section">

            <div class="row">
                <span class="label">
                    Paket Laundry
                </span>

                <span class="value">
                    {{ $transaksi->paket->nama_paket }}
                </span>
            </div>

            <div class="row">
                <span class="label">
                    Berat
                </span>

                <span class="value">
                    {{ $transaksi->berat }} Kg
                </span>
            </div>

            <div class="row">
                <span class="label">
                    Harga / Kg
                </span>

                <span class="value">
                    Rp {{ number_format($transaksi->harga_per_kg, 0, ',', '.') }}
                </span>
            </div>

        </div>


        {{-- TOTAL --}}
        <div class="total">

            <div class="row">

                <span class="label">
                    TOTAL PEMBAYARAN
                </span>

                <span class="value">
                    Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                </span>

            </div>

        </div>


        {{-- JADWAL --}}
        <div class="section">

            <div class="row">

                <span class="label">
                    Tanggal Masuk
                </span>

                <span class="value">
                    {{ $transaksi->tanggal_masuk->format('d-m-Y') }}
                </span>

            </div>

            <div class="row">

                <span class="label">
                    Tanggal Selesai
                </span>

                <span class="value">
                    {{ $transaksi->tanggal_selesai
                        ? $transaksi->tanggal_selesai->format('d-m-Y')
                        : '-' }}
                </span>

            </div>

        </div>





        {{-- FOOTER --}}
        <div class="footer">

            <p>
                Terima kasih telah menggunakan
            </p>

            <p>
                layanan <strong>CleanWash</strong>
            </p>

        </div>

    </div>


    {{-- BUTTON --}}
    <div class="actions">

        <button
            type="button"
            class="btn btn-print"
            onclick="window.print()"
        >
            🖨 Cetak Kwitansi
        </button>

        <a
            href="{{ route('transaksi.show', $transaksi) }}"
            class="btn btn-back"
        >
            Kembali
        </a>

    </div>

</body>
</html>
