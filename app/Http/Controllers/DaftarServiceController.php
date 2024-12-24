<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        // Mengambil semua data daftar service untuk ditampilkan
        $daftarServices = DaftarService::all();
        return view('daftar-service.index', compact('daftarServices'));
    }

    public function create()
    {
        // Mengambil data kendaraan dan pelanggan untuk dropdown di form create
        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();
        return view('daftar-service.create', compact('kendaraans', 'pelanggans'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kendaraans_id' => 'required|exists:kendaraans,id',  // Validasi kendaraan
            'pelanggans_id' => 'required|exists:pelanggans,id',  // Validasi pelanggan
            'keluhan' => 'required',  // Validasi keluhan
            'tanggal_servis' => 'required|date',  // Validasi tanggal servis
        ]);

        // Menyimpan data daftar service
        DaftarService::create([
            'kendaraans_id' => $request->kendaraans_id,
            'pelanggans_id' => $request->pelanggans_id,
            'keluhan' => $request->keluhan,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return redirect()->route('daftar-service.index')->with('success', 'Daftar Service berhasil ditambahkan');
    }

    public function edit(DaftarService $daftarService)
    {
        // Mengambil data kendaraan dan pelanggan untuk dropdown di form edit
        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();
        return view('daftar-service.edit', compact('daftarService', 'kendaraans', 'pelanggans'));
    }

    public function update(Request $request, DaftarService $daftarService)
    {
        // Validasi input
        $request->validate([
            'kendaraans_id' => 'required|exists:kendaraans,id',
            'pelanggans_id' => 'required|exists:pelanggans,id',
            'keluhan' => 'required',
            'tanggal_servis' => 'required|date',
        ]);

        // Update data daftar service
        $daftarService->update([
            'kendaraans_id' => $request->kendaraans_id,
            'pelanggans_id' => $request->pelanggans_id,
            'keluhan' => $request->keluhan,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return redirect()->route('daftar-service.index')->with('success', 'Data Daftar Service berhasil diperbarui');
    }

    public function destroy(DaftarService $daftarService)
    {
        // Menghapus data daftar service
        $daftarService->delete();

        return redirect()->route('daftar-service.index')->with('success', 'Daftar Service berhasil dihapus');
    }
}
