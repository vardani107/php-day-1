<?php

namespace App\Http\Controllers;

use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = jenis_kontak::all();
        // return view ('mastercontact' , compact('data'));

        $data = siswa::paginate(5);
        $jenis_kontak = jenis_kontak::paginate(5);
        return view('mastercontact', compact('data' , 'jenis_kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }


    public function tambah($id)
    {
        $siswa = siswa::find($id);
        $jenis_kontak = jenis_kontak::all();
        return view('view_c.c_contact   ', compact('siswa', 'jenis_kontak'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => 'attribute makasimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];
        
        $this->validate($request, [

        ], $message);

        kontak::create([
            'siswa_id' => $request->siswa_id,
            'jenis_kontak_id' => $request->jenis_kontak,
            'deskripsi' => $request->deskripsi,
        ]);

        Session::flash('benar', 'Selamat!!! Project Anda Berhasil Ditambahkan');
        return redirect('/mastercontact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = siswa::find($id)->kontak()->get();
        return view('view_c.s_contact', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = kontak::find($id);
        $siswa = siswa::find($id);
        return view('EditContact', compact('kontak', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $msg = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter'
        ];

        $this->validate($request,[

        ],$msg);

        $kontak = kontak::find($id);
        $kontak->jenis_kontak_id = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;

        $kontak->save();
        Session::flash('u_kontak', 'kontak berhasil di update');
        return redirect('mastercontact');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id)
    {
        $kontak = kontak::find($id)->delete();
        Session::flash('danger', 'Data Berhasil Dihapus');
        return redirect('/mastercontact');
    }
}
