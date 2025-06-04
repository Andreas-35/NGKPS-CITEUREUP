@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Transaksi</h2>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <select class="form-select" name="jenis" required>
                <option value="pemasukan" {{ $transaksi->jenis == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ $transaksi->jenis == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="{{ $transaksi->keterangan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" value="{{ $transaksi->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $transaksi->tanggal }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
