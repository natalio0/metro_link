<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Kendala</title>
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/formPengaduan.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container pt-4 bg-white">
        <h1 style="-webkit-text-stroke: medium; letter-spacing: 5px">AJUKAN KENDALA</h1>
        <span><a href="/metrolink/service" style="padding: 7px 22px 10px 22px;text-decoration: none;color: aliceblue;background-color: #1e1e1e;border-radius: 7px;">Back</a></span>
        <hr>

        {{-- Tampilkan pesan sukses jika ada --}}
        @if(session('success'))
            <script>
                $(document).ready(function() {
                    $('#successModal').modal('show');
                });
            </script>
        @endif

        {{-- Tampilkan pesan error jika ada --}}
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="telepon">Nomor Telepon Penanggung Jawab</label>
                <input type="text" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon" value="{{ old('telepon') }}"
                    class="form-control @error('telepon') is-invalid @enderror">
                @error('telepon')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="judul_pengaduan">Judul Pengaduan</label>
                <input type="text" id="judul_pengaduan" name="judul_pengaduan" placeholder="Masukkan Judul Pengaduan" value="{{ old('judul_pengaduan') }}"
                    class="form-control @error('judul_pengaduan') is-invalid @enderror">
                @error('judul_pengaduan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="foto">Upload Gambar</label>
                <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror">
                @error('foto')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="deskripsi_pengaduan">Deskripsi Pengaduan</label>
                <textarea class="form-control" id="deskripsi_pengaduan" rows="3" placeholder="Masukkan Deskripsi Pengaduan" name="deskripsi_pengaduan">{{ old('deskripsi_pengaduan') }}</textarea>
                @error('deskripsi_pengaduan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat" name="alamat">{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="submit" id="submit-agenda" name="submit-agenda" class="btn btn-primary">
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
