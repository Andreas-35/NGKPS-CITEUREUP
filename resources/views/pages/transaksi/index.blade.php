@extends('layouts.app')

@section('content')
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>

    <table class="table">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ ucfirst($transaksi->jenis) }}</td>
                    <td>{{ $transaksi->keterangan }}</td>
                    <td>Rp{{ number_format($transaksi->jumlah, 2) }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
