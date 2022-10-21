@extends('master.admin')
@section('title', 'Tambah Kontak')
{{-- @section('content-title', 'Tambah Kontak - ' . $siswa->nama) --}}
@section('content')

@if ($message = Session::get('jkontak_store'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dimsiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif



<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow mb-4">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('jenis_kontak.store') }}"></form>
            </div>
        </div>
    </div>
</div>


 <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('jenis_kontak.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id_siswa" value="">
                    <label for="nama">NAMA KONTAK</label>
                    <input type="text" class="form-control" id="nama_project" name="nama_project">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="simpan">
                    <a href="{{ route('jenis_kontak.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
