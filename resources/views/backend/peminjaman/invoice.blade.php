clear<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Peminjaman</title>
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

        .label {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            border: 2px solid #000;
            margin-top: 20px;
            display: inline-block;
            text-align: right;
            margin-right: 0;
        }

        .solid-line {
            border: 0;
            border-top: 2px solid #000;
            margin: 20px 0;
        }

        .dashed-line {
            border: 0;
            border-top: 2px dashed #000;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Tambahkan logo di sini -->
        <img src="{{ public_path('assets/media/avatars/logo.png') }}" alt="Tut Wuri Handayani">
        <h1>{{ $kop_surat->nama_aplikasi }}</h1>
        <h2>{{ $kop_surat->alamat }}</h2>
        <p>Email: {{ $kop_surat->email }} - Telp: {{ $kop_surat->no_telp }} - Website: {{ $kop_surat->website }}</p>
        <hr class="solid-line">
        <h3>Invoice Peminjaman Buku</h3>
    </div>

    <div class="label">Siswa</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $peminjaman->kode_peminjaman }}</td>
                <td>{{ $peminjaman->user->name }}</td>
                <td>{{ $peminjaman->pustaka->judul_pustaka }}</td>
                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                <td>{{ $peminjaman->tanggal_kembali }}</td>
                <td>{{ $peminjaman->status }}</td>
            </tr>
        </tbody>
    </table>

    <hr class="dashed-line">

    <div class="label">Petugas</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $peminjaman->kode_peminjaman }}</td>
                <td>{{ $peminjaman->user->name }}</td>
                <td>{{ $peminjaman->pustaka->judul_pustaka }}</td>
                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                <td>{{ $peminjaman->tanggal_kembali }}</td>
                <td>{{ $peminjaman->status }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Printed on: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>

</html>
