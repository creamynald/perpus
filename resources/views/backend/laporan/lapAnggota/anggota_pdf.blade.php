<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Anggota</title>
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
            Laporan Anggota Tahun {{ \Carbon\Carbon::now()->year }}
        </h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Point</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $key => $row)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->no_telp }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->point }}</td>
                    <td>
                        @if ($row->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Printed on: {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>

</html>
