@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Kegiatan Gereja</h2>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($kegiatan->count())
        <div class="list-group">
            @foreach ($kegiatan as $item)
                <div class="list-group-item">
                    <h5 class="mb-1">{{ $item->judul }}</h5>
                    <p class="mb-1">{{ $item->deskripsi }}</p>
                    <small class="text-muted">
                        Waktu: {{ \Carbon\Carbon::parse($item->waktu)->format('d M Y, H:i') }} |
                        Lokasi: {{ $item->lokasi ?? '-' }}
                    </small>

                    <div class="mt-2">
                        <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Belum ada kegiatan yang ditambahkan.</p>
    @endif
</div>
@endsection
