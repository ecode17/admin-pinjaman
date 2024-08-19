<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\JenisPinjaman;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        $data = Pinjaman::with(['nasabah', 'jenisPinjaman'])
            ->get()
            ->map(function($pinjaman) {
                return [
                    'id_pinjaman' => $pinjaman->id_pinjaman,
                    'NIK' => $pinjaman->nasabah->nik,
                    'Nama' => $pinjaman->nasabah->nama,
                    'Nama Pinjaman' => $pinjaman->jenisPinjaman->nama_pinjaman,
                    'Total Pinjaman' => $pinjaman->total_pinjaman,
                    'Tenor' => $pinjaman->tenor,
                    'Nominal Angsuran' => $pinjaman->nominal_angsuran,
                ];
            });

        return view('pinjaman.index', compact('data'));
    }

    public function create()
    {
        $nasabah = Nasabah::all();
        $jenisPinjaman = JenisPinjaman::all();

        return view('pinjaman.create', compact('nasabah', 'jenisPinjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_nasabah' => 'required|exists:nasabah,id_nasabah',
            'id_jenis_pinjaman' => 'required|exists:jenis_pinjaman,id_jenis_pinjaman',
            'total_pinjaman' => 'required|numeric',
            'tenor' => 'required|integer',
        ]);
    
        $nominal_angsuran = $request->total_pinjaman / $request->tenor;
    
        Pinjaman::create([
            'id_nasabah' => $request->id_nasabah,
            'id_jenis_pinjaman' => $request->id_jenis_pinjaman,
            'total_pinjaman' => $request->total_pinjaman,
            'tenor' => $request->tenor,
            'nominal_angsuran' => $nominal_angsuran,
        ]);
    
        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $nasabah = Nasabah::all();
        $jenisPinjaman = JenisPinjaman::all();

        return view('pinjaman.edit', compact('pinjaman', 'nasabah', 'jenisPinjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_nasabah' => 'required|exists:nasabah,id_nasabah',
            'id_jenis_pinjaman' => 'required|exists:jenis_pinjaman,id_jenis_pinjaman',
            'total_pinjaman' => 'required|numeric',
            'tenor' => 'required|integer',
        ]);

        $nominal_angsuran = $request->total_pinjaman / $request->tenor;

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update([
            'id_nasabah' => $request->id_nasabah,
            'id_jenis_pinjaman' => $request->id_jenis_pinjaman,
            'total_pinjaman' => $request->total_pinjaman,
            'tenor' => $request->tenor,
            'nominal_angsuran' => $nominal_angsuran,
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil dihapus.');
    }
}
