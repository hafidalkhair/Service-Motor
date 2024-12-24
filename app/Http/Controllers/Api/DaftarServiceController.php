<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    // Menampilkan semua daftar service
    public function index()
    {
        $daftarServices = DaftarService::all();
        return response()->json($daftarServices);
    }

    // Menampilkan daftar service berdasarkan ID
    public function show($id)
    {
        $daftarService = DaftarService::find($id);

        if (!$daftarService) {
            return response()->json(['message' => 'Daftar service tidak ditemukan'], 404);
        }

        return response()->json($daftarService);
    }

    // Menambahkan daftar service baru
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
        $daftarService = DaftarService::create([
            'kendaraans_id' => $request->kendaraans_id,
            'pelanggans_id' => $request->pelanggans_id,
            'keluhan' => $request->keluhan,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return response()->json($daftarService, 201);
    }

    // Mengupdate data daftar service
    public function update(Request $request, $id)
    {
        $daftarService = DaftarService::find($id);

        if (!$daftarService) {
            return response()->json(['message' => 'Daftar service tidak ditemukan'], 404);
        }

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

        return response()->json($daftarService);
    }

    // Menghapus daftar service
    public function destroy($id)
    {
        $daftarService = DaftarService::find($id);

        if (!$daftarService) {
            return response()->json(['message' => 'Daftar service tidak ditemukan'], 404);
        }

        // Menghapus data daftar service
        $daftarService->delete();

        return response()->json(['message' => 'Daftar service berhasil dihapus']);
    }
}
