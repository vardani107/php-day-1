@extends('master.admin')
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project - ' . $siswa->nama)
@section('content')

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('master_project.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                    <label for="nama">NAMA PROJECT</label>
                    <input type="text" class="form-control" id="nama_project" name="nama_project">
                </div>

                <div class="form-group">
                    <label for="nama">DESKRIPSI PROJECT</label>
                    <textarea  class="form-control" id="deskripsi" name="deskripsi"></textarea>
                </div>

                <div class="form-group">
                    <label for="nama">TANGGAL PROJECT</label>
                    <input type="date" class="form-control" id="tanggal_project" name="tanggal">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="simpan">
                    <a href="{{ route('master_project.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
