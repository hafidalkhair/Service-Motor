<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('servic.index', compact('services'));
    }

    public function create()
    {
        $daftarServices = DaftarService::all();
        return view('servic.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_services_id' => 'required|exists:daftar_services,id',
            'keluhan' => 'required',
            'estimasi_servis' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'required',
        ]);
    
        // Simpan data
        Service::create($request->all());
    
        return redirect()->route('service.index')->with('success', 'Service berhasil ditambahkan');
    }
    
    

    // Fungsi untuk mengambil keluhan berdasarkan id servis pelanggan
    public function getKeluhan($id)
    {
        $daftarService = DaftarService::find($id);
        return response()->json(['keluhan' => $daftarService->keluhan]);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $daftarServices = DaftarService::all(); // Mengambil daftar service untuk dropdown
        return view('servic.edit', compact('service', 'daftarServices'));
    }

    // Fungsi untuk menyimpan perubahan setelah edit
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
        $service->update($request->all());

        return redirect()->route('service.index')->with('success', 'Service berhasil diupdate');
    }

    // Fungsi untuk menghapus data service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service berhasil dihapus');
    }
}
