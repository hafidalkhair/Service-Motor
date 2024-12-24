<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Menampilkan semua data service
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }

    // Menampilkan data service berdasarkan ID
    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service tidak ditemukan'], 404);
        }

        return response()->json($service);
    }

    // Menambahkan service baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'daftar_services_id' => 'required|exists:daftar_services,id',
            'keluhan' => 'required',
            'estimasi_servis' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'required',
        ]);
    
        // Simpan data
        $service = Service::create($request->all());
    
        return response()->json($service, 201);
    }

    // Mengambil keluhan berdasarkan ID daftar service
    public function getKeluhan($id)
    {
        $daftarService = DaftarService::find($id);

        if (!$daftarService) {
            return response()->json(['message' => 'Daftar service tidak ditemukan'], 404);
        }

        return response()->json(['keluhan' => $daftarService->keluhan]);
    }

    // Mengupdate data service
    public function update(Request $request, $id)
    {
        $request->validate([
            'daftar_services_id' => 'required|exists:daftar_services,id',
            'keluhan' => 'required',
            'estimasi_servis' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'required',
        ]);

        $service = Service::findOrFail($id);

        // Update data service
        $service->update($request->all());

        return response()->json($service);
    }

    // Menghapus data service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Menghapus data service
        $service->delete();

        return response()->json(['message' => 'Service berhasil dihapus']);
    }
}
