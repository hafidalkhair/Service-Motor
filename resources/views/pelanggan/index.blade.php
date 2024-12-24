@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Data Pelanggan</h1>
        
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->nama_lengkap }}</td>
                        <td>{{ $pelanggan->no_hp }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->pekerjaan }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" style="display:inline;">
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
