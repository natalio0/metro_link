<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/viewDetail.css">
</head>

<body>
    <div class="container">
        <h1>Detail Pengaduan</h1>
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $pengaduan->id }}</td>
            </tr>
            <tr>
                <th>Nama Pengadu</th>
                <td>{{ $pengaduan->username }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $pengaduan->email }}</td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td>{{ $pengaduan->telepon }}</td>
            </tr>
            <tr>
                <th>Judul Pengaduan</th>
                <td>{{ $pengaduan->judul_pengaduan }}</td>
            </tr>
            <tr>
                <th>Deskripsi Pengaduan</th>
                <td>{{ $pengaduan->deskripsi_pengaduan }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pengaduan->alamat }}</td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>
                    @if($pengaduan->foto)
                        <img src="{{ asset('/storage/uploads/' . $pengaduan->foto) }}"/>
                    @else
                        Tidak ada foto
                    @endif
                </td>
            </tr>
        </table>
        <a href="/admin/pengaduan" class="btn btn-primary">Back</a>
    </div>

</body>

</html>
