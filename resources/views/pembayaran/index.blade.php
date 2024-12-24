@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pembayaran</h1>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>No Plat Kendaraan</th>
                <th>Nama Pelanggan</th>
                <th>Jumlah Biaya</th>
                <th>Jenis Pembayaran</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->id }}</td>
                    <td>{{ $pembayaran->daftarService->kendaraan->no_plat }}</td>
                    <td>{{ $pembayaran->daftarService->pelanggan->nama_lengkap }}</td>
                    <td>{{ $pembayaran->jumlah_biaya }}</td>
                    <td>{{ $pembayaran->jenis_pembayaran }}</td>
                    <td>{{ $pembayaran->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">Hapus</button>
                        </form>
                    </td
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
