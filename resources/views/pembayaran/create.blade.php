@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pembayaran</h1>

        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="services_id" class="form-label">Daftar Service</label>
                <select name="services_id" id="services_id" class="form-control" required>
                    @foreach ($daftarServices as $daftarService)
                        <option value="{{ $daftarService->id }}">
                            {{ $daftarService->kendaraan->no_plat }} - {{ $daftarService->pelanggan->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_biaya" class="form-label">Jumlah Biaya</label>
                <input type="number" name="jumlah_biaya" id="jumlah_biaya" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label><br>
                <input type="radio" name="jenis_pembayaran" value="Cash" required> Cash
                <input type="radio" name="jenis_pembayaran" value="Non Tunai" required> Non Tunai
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
