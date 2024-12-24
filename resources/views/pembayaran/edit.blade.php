@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pembayaran</h1>

        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="services_id" class="form-label">Daftar Service</label>
                <select name="services_id" id="services_id" class="form-control" required>
                    @foreach ($daftarServices as $daftarService)
                        <option value="{{ $daftarService->id }}" 
                            {{ $daftarService->id == $pembayaran->services_id ? 'selected' : '' }}>
                            {{ $daftarService->kendaraan->no_plat }} - {{ $daftarService->pelanggan->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_biaya" class="form-label">Jumlah Biaya</label>
                <input type="number" name="jumlah_biaya" id="jumlah_biaya" class="form-control" value="{{ $pembayaran->jumlah_biaya }}" required>
            </div>

            <div class="mb-3">
                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label><br>
                <input type="radio" name="jenis_pembayaran" value="Cash" {{ $pembayaran->jenis_pembayaran == 'Cash' ? 'checked' : '' }} required> Cash
                <input type="radio" name="jenis_pembayaran" value="Non Tunai" {{ $pembayaran->jenis_pembayaran == 'Non Tunai' ? 'checked' : '' }} required> Non Tunai
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control">{{ $pembayaran->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
