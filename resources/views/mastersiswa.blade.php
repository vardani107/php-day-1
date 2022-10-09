{{-- @section('master.title', 'Master Siswa') --}}
{{-- @extends('home') --}}
@extends('master.admin')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('content')
    {{-- <div class="row"> --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dimsiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dimsiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="col-lg-12">
        <div class="card shadow mb-">
            <div class="card-header py-3 bg-danger">
                <a href="{{ route('master_siswa.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NISN</th>
                            <th scope="col">ALAMAT</th>
                            {{-- <th scope="col">JENIS KELAMIN</th> --}}
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->alamat }}</td>
                                {{-- <td>{{$item->jk}}</td> --}}
                                <td>
                                    <a href="{{ route('master_siswa.show', $item->id) }}"
                                        class="btn btn-info btn-circle btn-sm"><i class="fas fa-info"></i></a>
                                    <a href="{{ route('master_siswa.edit', $item->id) }}"
                                        class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('master_siswa.hapus', $item->id) }}"
                                        class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
