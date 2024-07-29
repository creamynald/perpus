<!-- resources/views/invoices/invoice.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Peminjaman Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 100px; }
        .header h1 { margin: 0; font-size: 24px; }
        .header h2 { margin: 5px 0; font-size: 18px; }
        .header p { margin: 5px 0; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('assets/media/avatars/logo.png') }}" alt="Tut Wuri Handayani">
        <h1>SDN Negeri 40 Bengkalis</h1>
        <h2>Jalan Awang Mahmuda</h2>
        <p>No Telp: 021-672561</p>
        <p>Email: sdn40bengkalis@gmail.com</p>
        <hr>
        <h3>Invoice Peminjaman Buku</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Detail</th>
                <th>Informasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kode Peminjaman</td>
                <td>{{ $peminjaman->kode_peminjaman }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nama Peminjam</td>
                <td>{{ $peminjaman->user->name }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Judul Buku</td>
                <td>{{ $peminjaman->pustaka->judul }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Tanggal Pinjam</td>
                <td>{{ $peminjaman->tanggal_pinjam }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Tanggal Kembali</td>
                <td>{{ $peminjaman->tanggal_kembali }}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Status</td>
                <td>{{ $peminjaman->status }}</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Jenis Denda</td>
                <td>{{ $peminjaman->jenis_denda }}</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Denda Non-Moneter</td>
                <td>{{ $peminjaman->denda_non_moneter }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Printed on: {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</p>
    </div>
</body>
</html>