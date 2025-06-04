@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Laporan Transaksi</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th class="text-end">Jumlah (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $t)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($t->jenis) }}</td>
                    <td>{{ $t->keterangan }}</td>
                    <td class="text-end">{{ number_format($t->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr class="my-4">

    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-success">
                <strong>Total Pemasukan:</strong><br>
                Rp{{ number_format($totalPemasukan, 0, ',', '.') }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-danger">
                <strong>Total Pengeluaran:</strong><br>
                Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-info">
                <strong>Saldo Akhir:</strong><br>
                Rp{{ number_format($totalPemasukan - $totalPengeluaran, 0, ',', '.') }}
            </div>
        </div>
    </div>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali ke Transaksi</a>
</div>
@endsection
