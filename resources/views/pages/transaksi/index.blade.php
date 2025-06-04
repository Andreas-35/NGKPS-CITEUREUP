@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Laporan Ringkas</h5>
        </div>
        <div class="card-body">
            <p><strong>Total Pemasukan:</strong> Rp{{ number_format($totalPemasukan, 2, ',', '.') }}</p>
            <p><strong>Total Pengeluaran:</strong> Rp{{ number_format($totalPengeluaran, 2, ',', '.') }}</p>
            <p><strong>Saldo:</strong> Rp{{ number_format($totalPemasukan - $totalPengeluaran, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Jenis</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ ucfirst($transaksi->jenis) }}</td>
                    <td>{{ $transaksi->keterangan }}</td>
                    <td>Rp{{ number_format($transaksi->jumlah, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
