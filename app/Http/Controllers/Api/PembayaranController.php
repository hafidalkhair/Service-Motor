<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan semua data pembayaran
    public function index()
    {
        $pembayarans = Pembayaran::with('daftarService.kendaraan', 'daftarService.pelanggan')->get();
        return response()->json($pembayarans);
    }

    // Menampilkan data pembayaran berdasarkan ID
    public function show($id)
    {
        $pembayaran = Pembayaran::with('daftarService.kendaraan', 'daftarService.pelanggan')->find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        return response()->json($pembayaran);
    }

    // Menambahkan pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'services_id' => 'required|exists:daftar_services,id',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Cash,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan pembayaran
        $pembayaran = Pembayaran::create([
            'services_id' => $request->services_id,
            'jumlah_biaya' => $request->jumlah_biaya,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json($pembayaran, 201); // Mengembalikan data pembayaran yang baru ditambahkan
    }

    // Mengupdate data pembayaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'services_id' => 'required|exists:daftar_services,id',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Cash,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'services_id' => $request->services_id,
            'jumlah_biaya' => $request->jumlah_biaya,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'keterangan' => $request->keterangan,
        ]);

        return response()->json($pembayaran);
    }

    // Menghapus data pembayaran
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return response()->json(['message' => 'Pembayaran berhasil dihapus']);
    }
}
