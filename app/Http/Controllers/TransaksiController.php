<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{

public function index()
{
    $transaksis = Transaksi::all();

    return view('pages.transaksi.index', compact('transaksis'));
}

public function create()
{
    return view('pages.transaksi.create');
}

public function store(Request $request)
{
    dd(Auth::id());
    $request->validate([
        'jenis' => 'required|string',
        'keterangan' => 'required|string',
        'jumlah' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    Transaksi::create([
        'jenis' => $request->jenis,
        'keterangan' => $request->keterangan,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
        'user_id' => Auth::id(), // <-- Tambahkan ini
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'jenis' => 'required|in:pemasukan,pengeluaran',
        'keterangan' => 'required|string',
        'jumlah' => 'required|numeric|min:0',
        'tanggal' => 'required|date',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->update($request->all());

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
}

public function __construct()
{
    $this->middleware('auth');
}

}
