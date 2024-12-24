@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Service</h1>
    <a href="{{ route('daftar-service.create') }}" class="btn btn-primary mb-3">Tambah Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>No Plat Kendaraan</th>
                <th>Nama Pelanggan</th>
                <th>Keluhan</th>
                <th>Tanggal Servis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarServices as $daftarService)
                <tr>
                    <td>{{ $daftarService->id }}</td>
                    <!-- Periksa apakah kendaraan dan pelanggan tidak null -->
                    <td>
                        @if($daftarService->kendaraan)
                            {{ $daftarService->kendaraan->no_plat }}
                        @else
                            No Plat Tidak Ditemukan
                        @endif
                    </td>
                    <td>
                        @if($daftarService->pelanggan)
                            {{ $daftarService->pelanggan->nama_lengkap }}
                        @else
                            Nama Pelanggan Tidak Ditemukan
                        @endif
                    </td>
                    <td>{{ $daftarService->keluhan }}</td>
                    <td>{{ $daftarService->tanggal_servis }}</td>
                    <td>
                        <a href="{{ route('daftar-service.edit', $daftarService->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('daftar-service.destroy', $daftarService->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
