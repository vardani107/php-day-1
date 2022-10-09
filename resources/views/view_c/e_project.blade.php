@extends('master.admin')
@section('title', 'Edit Project')
@section('content-title', 'Edit Project')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('master_project.update', $project->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="nama">NAMA PROJECT</label>
                                <input type="text" class="form-control" id="nama_project" name="nama_project"
                                    value="{{ $project->nama_project }}">
                            </div>

                            <div class="form-group">
                                <label for="nama">DESKRIPSI PROJECT</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi">{{ $project->deskripsi }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="nama">TANGGAL PROJECT</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $project->tanggal }}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="input" value="Update">Simpan</button>
                                <a href="{{ route('master_project.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
