<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan semua data pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return response()->json($pelanggans);
    }

    // Menambahkan data pelanggan
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'pekerjaan' => 'required|string',
        ]);

        $pelanggan = Pelanggan::create($request->all());
        return response()->json($pelanggan, 201);
    }

    // Menampilkan data pelanggan berdasarkan ID
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($pelanggan);
    }

    // Mengupdate data pelanggan
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pelanggan->update($request->all());
        return response()->json($pelanggan);
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pelanggan->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
