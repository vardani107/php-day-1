{{-- @section('master.title', 'Master Siswa') --}}
@extends('master.admin')
@section('title', 'Master project')
@section('content-title', 'Master project')
@section('content')

    {{-- message jika benar --}}
    @if ($message = Session::get('tambah'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    {{-- message jika salah --}}
    @if ($message = Session::get('hapus'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    {{-- message jika berhasil update --}}
    @if ($message = Session::get('update'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row">

        {{-- Data Siswa --}}
        <div class="col-lg-5">
            <div class="card shadow mb-">
                <div class="card-header bg-danger text-light">
                    <h6 class="m-0 font-weight-bold "> Data Siswa</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col"">ACTION</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <a class="btn-sm btn-info" onclick="show({{ $item->id }})"><i
                                            class="fas fa-folder-open"></i></a>
                                    <a href="{{ route('master_project.tambah', $item->id) }}" class="btn-sm btn-success"><i
                                            class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="card-footer d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Project Siswa --}}
        <div class="col-lg-7">
            <div class="card shadow">
                <div class="card-header bg-danger text-light">
                    <h6 class="m-0 font-weight-bold "><i class=""> Project Siswa</i></h6>
                </div>
                <div id="project" class="card-body">
                    <h6 class="text-center">Pilih Siswa terlebih dahulu</h6>
                </div>
            </div>
        </div>

    </div>

    <script>
        function show(id) {
            $.get('master_project/' + id, function(data) {
                $('#project').html(data);
            })
        }
    </script>

@endsection
