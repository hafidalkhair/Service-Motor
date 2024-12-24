<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('daftarService.kendaraan', 'daftarService.pelanggan')->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $daftarServices = DaftarService::with('kendaraan', 'pelanggan')->get();
        return view('pembayaran.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'services_id' => 'required|exists:daftar_services,id',
            'jumlah_biaya' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Cash,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        Pembayaran::create([
            'services_id' => $request->services_id,
            'jumlah_biaya' => $request->jumlah_biaya,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $daftarServices = DaftarService::with('kendaraan', 'pelanggan')->get();
        return view('pembayaran.edit', compact('pembayaran', 'daftarServices'));
    }

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

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pembayaran::destroy($id);
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}
