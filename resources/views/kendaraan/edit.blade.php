@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Kendaraan</h1>

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="no_plat" class="form-label">No Plat Kendaraan</label>
            <input type="text" name="no_plat" id="no_plat" class="form-control" value="{{ old('no_plat', $kendaraan->no_plat) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kendaraan</label>
            <div>
                <input type="radio" name="jenis_kendaraan" value="Matic" {{ $kendaraan->jenis_kendaraan == 'Matic' ? 'checked' : '' }} required> Matic
                <input type="radio" name="jenis_kendaraan" value="Manual Transimisi" {{ $kendaraan->jenis_kendaraan == 'Manual Transimisi' ? 'checked' : '' }} required> Manual Transimisi
            </div>
        </div>

        <div class="mb-3">
            <label for="no_stnk" class="form-label">No STNK</label>
            <input type="text" name="no_stnk" id="no_stnk" class="form-control" value="{{ old('no_stnk', $kendaraan->no_stnk) }}" required>
        </div>

        <div class="mb-3">
            <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan Kendaraan</label>
            <input type="number" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control" value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}" required>
        </div>

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Nama Pemilik</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ $kendaraan->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>{{ $pelanggan->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="warna" class="form-label">Warna Kendaraan</label>
            <input type="text" name="warna" id="warna" class="form-control" value="{{ old('warna', $kendaraan->warna) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
