{{-- @section('master.title', 'Master Siswa') --}}
@extends('master.admin')
@section('title', 'Master project')
@section('content-title', 'Master project')
@section('content')
    <!--Projects-->
    {{-- <section id="projects">
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-5">
                        <h2>My Projects</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1586802978403-6406fb3ddfff?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1467043198406-dc953a3defa0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cG90dGVkJTIwcGxhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="https://images.unsplash.com/photo-1557090495-fc9312e77b28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,224L60,240C120,256,240,288,360,298.7C480,309,600,299,720,256C840,213,960,139,1080,117.3C1200,96,1320,128,1380,144L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg> --}}
    <!--End of projects-->

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
                                    <a class="btn-sm btn-info" onclick="show({{$item->id}})"><i class="fas fa-folder-open"></i></a>
                                    <a href="{{route('master_project.tambah', $item ->id)}}" class="btn-sm btn-success"><i class="fas fa-plus"></i></a>
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
            $.get('master_project/'+id,function(data){
                $('#project').html(data);
            })
        }
    </script>

@endsection
