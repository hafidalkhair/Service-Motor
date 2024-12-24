@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pelanggan</h1>

        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan metode PUT untuk update -->

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}" required>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $pelanggan->no_hp) }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
