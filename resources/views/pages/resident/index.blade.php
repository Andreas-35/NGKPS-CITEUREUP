@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jemaat</h1>
        <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a> 
    </div> 

    {{--table--}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nij</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Status Perkawinan</th>
                                <th>Alamat</th>
                                <th>Telepone</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    @if (count($residents) < 1 )
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <p class="pt-3 text-center">Tidak ada data</p>
                            </td>
                        </tr>
                    </tbody>
                    @else 
                    <tbody>
                        @foreach ($residents as $item)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$item->nij}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->gender}}</td>
                                <td>{{$item->birth_place}},{{$item->birth_date}}</td>
                                <td>{{$item->status_perkawinan}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/resident/{{ $item->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger"data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id}}">
                                            <i class="fas fa-eraser"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>  
                        @include('pages.resident.confirmation-delete')
                        @endforeach
                    </tbody>
                    @endif
                    </table>
                </div>
            </div>  
        </div>
    </div>
@endsection