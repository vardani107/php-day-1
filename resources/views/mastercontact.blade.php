@extends('master.admin')
@section('title', 'Master contact')
@section('content-title', 'Master contact')
@section('content')


    <div class="row">

        {{-- jenis kontak --}}
        <div class="col-lg-12 pb-4">
            <div class="card shadow">
                <div class="card shadow mb-4">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                        data-whatever> Tambah Jenis Kontak</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel"><b>Tambah Jenis Kontak</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="form-grup" style="padding:2%">
                                    <form method="post" enctype="multipart/form-data"
                                        action="{{ route('jenis_kontak.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Nama">Nama Aplikasi</label>
                                            <input type="text" class="form-control" id="nama" name='nama'>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('master_contact.index') }}" class="btn btn-danger">Batal</a>
                                            <input type="submit" class="btn btn-success" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div class="card-header py-3 bg-danger">
                        <a href="{{ route('jenis_kontak.create') }}" class="btn btn-success ">Tambah Kontak</a>
                    </div> --}}
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">JENIS KONTAK</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->jenis_kontak }}</td>
                            <td>
                                <a href="{{ route('jenis_kontak.edit', $item->id) }}"
                                    class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('jenis_kontak.hapus', $item->id) }}"
                                    class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>


    {{-- data siswa --}}
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header bg-danger text-light">
                <h6 class="m-0 font-weight-bold">Data siswa</h6>
            </div>
            <div class="card-body">
                <div class="card-shadow ">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th scope="col">NISN</th> --}}
                                <th scope="col">NAMA</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tr>
                                {{-- <td>{{ $item->nisn }}</td> --}}
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <a href="" class="btn-sm btn-info" onclick="show({{ $item->id }})"><i
                                            class="fas fa-folder-open"></i></a>
                                    <a href="
                                {{-- {{ route('master_contact.tambah', $item->id) }} --}}
                                "
                                        class="btn-sm btn-success"><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- kontak siswa --}}
    <div class="col-lg-6">
        <div class="card shadow">
            <div class="card-header bg-danger text-light">
                <h6 class="m-0 font-weight-bold "><i class=""> Kontak Siswa</i></h6>
            </div>
            <div id="project" class="card-body">
                <h6 class="text-center">Pilih Siswa terlebih dahulu</h6>
            </div>
        </div>
    </div>

    </div>

    <script>
        function show(id) {
            $.get('master_contact/' + id, function(data) {
                $('#contact').html(data);
            })
        }
    </script>


@endsection
