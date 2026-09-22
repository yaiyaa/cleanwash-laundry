<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Transaksi CleanWash
    </title>

    <style>

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .header p {
            margin-top: 5px;
            color: #666;
        }

        .summary {
            width: 100%;
            margin-bottom: 20px;
        }

        .summary td {
            width: 33.33%;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .summary-title {
            color: #666;
            font-size: 10px;
        }

        .summary-value {
            font-size: 16px;
            font-weight: bold;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #e8f5ff;
            color: #183b56;
            padding: 8px;
            border: 1px solid #cfdde8;
            text-align: left;
        }

        table td {
            padding: 7px;
            border: 1px solid #ddd;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            color: #666;
            font-size: 10px;
        }

    </style>

</head>

<body>

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="header">

        <h1>
            CLEANWASH
        </h1>

        <p>
            Laporan Transaksi Laundry
        </p>

        <p>
            Sistem Informasi Manajemen Laundry Berbasis Web
        </p>

    </div>


    {{-- =====================================================
         RINGKASAN
    ====================================================== --}}

    <table class="summary">

        <tr>

            <td>

                <div class="summary-title">
                    Total Transaksi
                </div>

                <div class="summary-value">
                    {{ $totalTransaksi }}
                </div>

            </td>

            <td>

                <div class="summary-title">
                    Total Berat
                </div>

                <div class="summary-value">
                    {{ number_format($totalBerat, 2, ',', '.') }} Kg
                </div>

            </td>

            <td>

                <div class="summary-title">
                    Total Pendapatan
                </div>

                <div class="summary-value">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </div>

            </td>

        </tr>

    </table>


    {{-- =====================================================
         DATA TRANSAKSI
    ====================================================== --}}

    <table>

        <thead>

            <tr>

                <th class="text-center">
                    No
                </th>

                <th>
                    Pelanggan
                </th>

                <th>
                    Paket
                </th>

                <th>
                    Berat
                </th>

                <th>
                    Harga/Kg
                </th>

                <th>
                    Total Harga
                </th>

                <th>
                    Tanggal Masuk
                </th>

                <th>
                    Tanggal Selesai
                </th>

                <th>
                    Status
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse ($transaksis as $transaksi)

                <tr>

                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $transaksi->pelanggan->nama }}
                    </td>

                    <td>
                        {{ $transaksi->paket->nama_paket }}
                    </td>

                    <td>
                        {{ number_format($transaksi->berat, 2, ',', '.') }} Kg
                    </td>

                    <td>
                        Rp {{ number_format($transaksi->harga_per_kg, 0, ',', '.') }}
                    </td>

                    <td>
                        Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $transaksi->tanggal_masuk
                            ? $transaksi->tanggal_masuk->format('d/m/Y')
                            : '-' }}
                    </td>

                    <td>
                        {{ $transaksi->tanggal_selesai
                            ? $transaksi->tanggal_selesai->format('d/m/Y')
                            : '-' }}
                    </td>

                    <td>
                        {{ $transaksi->status }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="9"
                        class="text-center"
                    >
                        Tidak ada data transaksi.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="footer">

        Dicetak dari sistem CleanWash

    </div>

</body>

</html>
