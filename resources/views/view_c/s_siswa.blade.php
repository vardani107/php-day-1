@extends('master.admin')
@section('title', 'Show Siswa')
@section('content-title','Show Siswa')
@section('content')
     <div class="row">
        <div class="col-lg-4">

            {{-- kartu satu --}}
            <div class="card shadow mb-4">
                <div class="card-header bg-danger text-light"></div>
                <div class="card-body">
                    <img src="{{asset('/template/img/'.$siswa->foto)}}" width="200" class="rounded-circle mt-3 mx-auto img-thumbnail" alt="">
                    <h4>{{$siswa->nama}}</h4>
                    <h5>{{$siswa->nisn}}</h5>
                    <h5>{{$siswa->jk}}</h5>
                    <h5>{{$siswa->alamat}}</h5>
                    

                </div>
            </div>
    
            {{-- kartu dua --}}
            <div class="card shadow">
                <div class="card-header bg-danger text-light">
                    <h6 class="m-0 font-weight-bold "><i class="fas fa-user-plus"> Kontak Siswa</i></h6>
                </div>
                <div class="card-body text-center ">
                    @foreach ($kontaks as $kontak)
                        <li>{{$kontak->jenis_kontak}}:{{$kontak->pivot->deskripsi}}</li>
                    @endforeach
                </div>
            </div>  

        </div>
        
        <div class="col-lg-8">

          {{-- kartu tiga --}}
          <div class="card shadow mb-4">
            <div class="card-header bg-danger text-light">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-quote-left"> About Siswa</i></h6>
            </div>
                <div class="card-body ">
                    <blockquote class="">
                        <p class="mb-0">{{$siswa->about}}</p>
                        <footer class="blockquote-footer">Ditulis Oleh <cite title="Source Title">{{$siswa->nama}}</cite></footer>
                    </blockquote>
                </div>
            </div>  

            {{-- kartu empat --}}
            <div class="card shadow">
                <div class="card-header bg-danger text-light">
                    <h6 class="m-0 font-weight-bold "><i class="fas fa-tasks"> Project Siswa</i></h6>
                </div>
                <div class="card-body">
                </div>
            </div>

        </div>

    </div> 
       {{-- <img src="{{asset('Puan_estetik.jpg?width=300&amp;height=100')}}" alt="aaa" width="200" class=" rounded-circle img-thumbnail"> --}}
@endsection 