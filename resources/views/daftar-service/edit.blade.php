@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Daftar Service</h1>
        <form action="{{ route('daftar-service.update', $daftarService->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Id Servis Pelanggan -->
            <div class="mb-3">
                <label for="pelanggans_id" class="form-label">Pelanggan</label>
                <select name="pelanggans_id" id="pelanggans_id" class="form-control" required>
                    <option value="" disabled>Pilih Pelanggan</option>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}" {{ $pelanggan->id == $daftarService->pelanggans_id ? 'selected' : '' }}>
                            {{ $pelanggan->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kendaraan -->
            <div class="mb-3">
                <label for="kendaraans_id" class="form-label">Kendaraan</label>
                <select name="kendaraans_id" id="kendaraans_id" class="form-control" required>
                    <option value="" disabled>Pilih Kendaraan</option>
                    @foreach ($kendaraans as $kendaraan)
                        <option value="{{ $kendaraan->id }}" {{ $kendaraan->id == $daftarService->kendaraans_id ? 'selected' : '' }}>
                            {{ $kendaraan->no_plat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Keluhan -->
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan Kendaraan</label>
                <textarea name="keluhan" id="keluhan" class="form-control" required>{{ $daftarService->keluhan }}</textarea>
            </div>

            <!-- Tanggal Servis -->
            <div class="mb-3">
                <label for="tanggal_servis" class="form-label">Tanggal Servis</label>
                <input type="date" name="tanggal_servis" id="tanggal_servis" class="form-control" value="{{ $daftarService->tanggal_servis }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
