<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan semua data kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return response()->json($kendaraans);
    }

    // Menambahkan data kendaraan
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'no_plat' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transimisi', // Validasi enum
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'warna' => 'required|string|max:50',
        ]);

        // Menyimpan data kendaraan
        $kendaraan = Kendaraan::create($request->all());
        return response()->json($kendaraan, 201);
    }

    // Menampilkan data kendaraan berdasarkan ID
    public function show($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($kendaraan);
    }

    // Mengupdate data kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Update data kendaraan
        $kendaraan->update($request->all());
        return response()->json($kendaraan);
    }

    // Menghapus data kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Menghapus data kendaraan
        $kendaraan->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
