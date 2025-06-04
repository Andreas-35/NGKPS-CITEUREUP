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
    $totalPemasukan = Transaksi::where('jenis', 'pemasukan')->sum('jumlah');
    $totalPengeluaran = Transaksi::where('jenis', 'pengeluaran')->sum('jumlah');

    return view('pages.transaksi.index', compact('transaksis', 'totalPemasukan', 'totalPengeluaran'));
}

public function create()
{
    return view('pages.transaksi.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'jenis' => 'required|string',
        'keterangan' => 'required|string',
        'jumlah' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    $validated['user_id'] = Auth::id(); // tambahkan user_id dari session aktif

    Transaksi::create($validated);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
}

public function edit($id)
{
    $transaksi = Transaksi::findOrFail($id);
    return view('pages.transaksi.edit', compact('transaksi'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'jenis' => 'required|in:pemasukan,pengeluaran',
        'keterangan' => 'required|string',
        'jumlah' => 'required|numeric',
        'tanggal' => 'required|date',
    ]);

    $transaksi = Transaksi::findOrFail($id);
    $transaksi->update($request->all());

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
}

public function laporan()
{
    $transaksis = Transaksi::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();

    $totalPemasukan = $transaksis->where('jenis', 'pemasukan')->sum('jumlah');
    $totalPengeluaran = $transaksis->where('jenis', 'pengeluaran')->sum('jumlah');

    return view('pages.transaksi.laporan', compact('transaksis', 'totalPemasukan', 'totalPengeluaran'));
}


// public function __construct()
// {
//     $this->middleware('auth');
// }

}
