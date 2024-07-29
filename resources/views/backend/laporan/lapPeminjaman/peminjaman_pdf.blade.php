<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 18px;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Tambahkan logo di sini -->
        <img src="{{ public_path('assets/media/avatars/logo.png') }}" alt="Tut Wuri Handayani">
        <h1>SDN Negeri 40 Bengkalis</h1>
        <h2>Jalan Awang Mahmuda</h2>
        <p>No Telp: 021-672561</p>
        <p>Email: sdn40bengkalis@gmail.com</p>
        <hr>
        <h3>
            @php
                $tglAwal = request('tgl_awal')
                    ? \Carbon\Carbon::parse(request('tgl_awal'))->locale('id')->format('j F Y')
                    : null;
                $tglAkhir = request('tgl_akhir')
                    ? \Carbon\Carbon::parse(request('tgl_akhir'))->locale('id')->format('j F Y')
                    : null;
            @endphp

            @if ($tglAwal && $tglAkhir)
                Laporan Peminjaman dari {{ $tglAwal }} hingga {{ $tglAkhir }}
            @else
                Laporan Peminjaman Selama {{ \Carbon\Carbon::now()->format('Y') }}
            @endif
        </h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $key => $row)
                @php
                    $tanggalPinjam = \Carbon\Carbon::parse($row->tanggal_pinjam)->format('j F Y');
                    $tanggalKembali = $row->tanggal_kembali
                        ? \Carbon\Carbon::parse($row->tanggal_kembali)->format('j F Y')
                        : 'Belum Kembali';
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $row->kode_peminjaman }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->pustaka->judul_pustaka }}</td>
                    <td>{{ $tanggalPinjam }}</td>
                    <td>{{ $tanggalKembali }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Printed on: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>

</html>
