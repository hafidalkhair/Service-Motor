<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan daftar kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::with('pelanggan')->get();
        return view('kendaraan.index', compact('kendaraans'));
    }

    // Menampilkan form tambah kendaraan
    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('kendaraan.create', compact('pelanggans'));
    }

    // Menyimpan data kendaraan
    public function store(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transimisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'warna' => 'required|string|max:50',
        ]);

        Kendaraan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'no_plat' => $request->no_plat,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'no_stnk' => $request->no_stnk,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan');
    }

    // Menampilkan form edit kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $pelanggans = Pelanggan::all();
        return view('kendaraan.edit', compact('kendaraan', 'pelanggans'));
    }

    // Memperbarui data kendaraan
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_plat' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transimisi',
            'no_stnk' => 'required|string|max:255',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update([
            'pelanggan_id' => $request->pelanggan_id,
            'no_plat' => $request->no_plat,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'no_stnk' => $request->no_stnk,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil diperbarui');
    }

    // Menghapus data kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus');
    }
}

