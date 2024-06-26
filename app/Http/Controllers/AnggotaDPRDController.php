<?php

namespace App\Http\Controllers;

use App\Models\AnggotaDPRD;
use Illuminate\Http\Request;

class AnggotaDPRDController extends Controller
{
    // Menampilkan semua data anggota DPRD
    public function index()
    {
        $anggotaDPRDs = AnggotaDPRD::all();
        return view('anggota.index', compact('anggotaDPRDs'));
    }

    // Menampilkan form untuk menambah anggota DPRD
    public function create()
    {
        return view('anggota.create');
    }

    // Menyimpan data anggota DPRD baru ke dalam database
    public function store(Request $request)
    {
        AnggotaDPRD::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota DPRD berhasil ditambahkan.');
    }

    // Menampilkan data anggota DPRD yang dipilih
    public function show(AnggotaDPRD $anggotaDPRD)
    {
        return view('anggota.show', compact('anggotaDPRD'));
    }

    // Menampilkan form untuk mengedit data anggota DPRD
    public function edit(AnggotaDPRD $anggotaDPRD)
    {
        return view('anggota.edit', compact('anggotaDPRD'));
    }

    // Mengupdate data anggota DPRD yang dipilih di database
    public function update(Request $request, AnggotaDPRD $anggotaDPRD)
    {
        $anggotaDPRD->update($request->all());
        return redirect()->route('anggota.index')->with('success', 'Data anggota DPRD berhasil diperbarui.');
    }

    // Menghapus data anggota DPRD dari database
    public function destroy(AnggotaDPRD $anggotaDPRD)
    {
        $anggotaDPRD->delete();
        return redirect()->route('anggota.index')->with('success', 'Data anggota DPRD berhasil dihapus.');
    }
}
