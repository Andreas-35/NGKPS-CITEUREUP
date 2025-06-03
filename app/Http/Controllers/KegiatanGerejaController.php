<?php

namespace App\Http\Controllers;

use App\Models\KegiatanGereja;
use Illuminate\Http\Request;

class KegiatanGerejaController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanGereja::all();
        return view('pages.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('pages.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'waktu' => 'required|date',
            'lokasi' => 'nullable|string'
        ]);

        KegiatanGereja::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kegiatan = KegiatanGereja::findOrFail($id);
        return view('pages.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'waktu' => 'required|date',
            'lokasi' => 'nullable|string',
        ]);

        $kegiatan = KegiatanGereja::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanGereja::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
