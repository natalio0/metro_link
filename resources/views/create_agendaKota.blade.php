<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="icon" href="/assets/logo-01.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/createAgenda.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container pt-4 bg-white">
                <h1>Ajukan Event</h1>
                <span><a href="/metrolink/agenda_kota" style="padding: 10px 22px 10px 22px;text-decoration: none;color: aliceblue;background-color: #1e1e1e;border-radius: 7px;">Back</a></span>
                <hr>

                {{-- Tampilkan pesan sukses jika ada --}}
                @if(session('success'))
                    <script>
                        $(document).ready(function() {
                            $('#successModal').modal('show');
                        });
                    </script>
                @endif

                <form action="{{ route('agenda_kota.storeAgenda') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama_penyelenggara">Nama Penyelenggara</label>
                        <input type="text" id="nama_penyelenggara" name="nama_penyelenggara" placeholder="Masukkan Nama Penyelenggara" value="{{ old('nama_penyelenggara') }}"
                            class="form-control @error('nama_penyelenggara') is-invalid @enderror">
                        @error('nama_penyelenggara')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="nama_event">Nama Event</label>
                        <input type="text" id="nama_event" name="nama_event" placeholder="Masukkan Nama Event" value="{{ old('nama_event') }}"
                            class="form-control @error('nama_event') is-invalid @enderror">
                        @error('nama_event')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Masukkan Kategori" value="{{ old('kategori') }}"
                            class="form-control @error('kategori') is-invalid @enderror">
                        @error('kategori')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="deskripsi_event">Deskripsi Event</label>
                        <textarea class="form-control" id="deskripsi_event" rows="3" placeholder="Masukkan Deskripsi Event" name="deskripsi_event">{{ old('deskripsi_event') }}</textarea>
                        @error('deskripsi_event')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                        <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan') }}"
                            class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror">
                        @error('tanggal_pelaksanaan')
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
