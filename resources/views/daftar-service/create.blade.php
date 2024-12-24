@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Daftar Service</h1>
        <form action="{{ route('daftar-service.store') }}" method="POST">
            @csrf

            <!-- Id Servis Pelanggan -->
            <div class="mb-3">
                <label for="pelanggans_id" class="form-label">Id Servis Pelanggan</label>
                <select name="pelanggans_id" id="pelanggans_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Pelanggan</option>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->id }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Pelanggan (Muncul Otomatis) -->
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" id="nama_pelanggan" class="form-control" readonly>
            </div>

            <!-- No Plat Kendaraan -->
            <div class="mb-3">
                <label for="kendaraans_id" class="form-label">No Plat Kendaraan</label>
                <select name="kendaraans_id" id="kendaraans_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Kendaraan</option>
                    @foreach ($kendaraans as $kendaraan)
                        <option value="{{ $kendaraan->id }}">{{ $kendaraan->no_plat }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Keluhan Kendaraan -->
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan Kendaraan</label>
                <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
            </div>

            <!-- Tanggal Servis -->
            <div class="mb-3">
                <label for="tanggal_servis" class="form-label">Tanggal Servis</label>
                <input type="date" name="tanggal_servis" id="tanggal_servis" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        // JavaScript untuk mengisi nama pelanggan secara otomatis
        const pelanggans = @json($pelanggans);
        const pelangganDropdown = document.getElementById('pelanggans_id');
        const namaPelangganInput = document.getElementById('nama_pelanggan');

        pelangganDropdown.addEventListener('change', function() {
            const selectedId = this.value;
            const pelanggan = pelanggans.find(p => p.id == selectedId);
            namaPelangganInput.value = pelanggan ? pelanggan.nama_lengkap : '';
        });
    </script>
@endsection
