@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Service</h1>

    <form action="{{ route('service.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Dropdown Id Servis Pelanggan -->
        <div class="mb-3">
            <label for="daftar_services_id" class="form-label">Id Servis Pelanggan</label>
            <select name="daftar_services_id" id="daftar_services_id" class="form-control" required>
                <option value="">Pilih Servis Pelanggan</option>
                @foreach ($daftarServices as $daftarService)
                    <option value="{{ $daftarService->id }}" {{ $service->daftar_services_id == $daftarService->id ? 'selected' : '' }}>
                        {{ $daftarService->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Keluhan -->
        <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan Kendaraan</label>
            <input type="text" name="keluhan" id="keluhan" class="form-control" value="{{ $service->keluhan }}" readonly>
        </div>

        <!-- Estimasi Service -->
        <div class="mb-3">
            <label for="estimasi_servis" class="form-label">Estimasi Service</label>
            <input type="text" name="estimasi_servis" id="estimasi_servis" class="form-control" value="{{ $service->estimasi_servis }}" required>
        </div>

        <!-- Nama Mekanik -->
        <div class="mb-3">
            <label for="nama_mekanik" class="form-label">Nama Mekanik</label>
            <input type="text" name="nama_mekanik" id="nama_mekanik" class="form-control" value="{{ $service->nama_mekanik }}" required>
        </div>

        <!-- Sparepart Pengganti -->
        <div class="mb-3">
            <label for="sparepart_pengganti" class="form-label">Sparepart Pengganti</label>
            <input type="text" name="sparepart_pengganti" id="sparepart_pengganti" class="form-control" value="{{ $service->sparepart_pengganti }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
