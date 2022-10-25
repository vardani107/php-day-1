<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\jenis_kontak;
use App\Models\siswa;

class JContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $jkontak = jenis_kontak::paginate(5);
        // return view ( 'master_contact', compact('jkontak'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view ('view_c.c_Jkontak');
        // $siswa = siswa::find($id);
        // return view('view_c.c_Jkontak', 'compact'('siswa'));
        return view('view_c.c_Jkontak');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $msg = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ': attribute maksimal :max karakter gaess'
        ];

        $this -> validate($request, [
            'jenis_kontak' => 'required'
        ], $msg);

        Session::flash('jkontak_store', 'Jenis Kontak tersimpan !!!');
        return redirect('/master_contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $siswa = jenis_kontak::find($id);
        // $kontaks = $siswa->()->get();
        // return ($kontaks);
        // return view('view_c.s_siswa', compact('siswa', 'kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jkontak = jenis_kontak::find($id);
        // $kontaks = $siswa->kontak()->get();
        return view('view_c.s_siswa', compact('jkontak'));
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
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ': attribute maksimal :max karakter gaess'
        ];

        $this->validate($request, [
            'jenis_kontak' =>'required'
        ], $msg);

        $jkontak = jenis_kontak::find($id);
        $jkontak -> jenis_kontak = $request -> jenis_kontak;

        $jkontak->save();
        Session::flash('update_jkontak', 'Jenis Kontak anda telah diperbarui !!!');
        return redirect('/master_contact');
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

    public function hapus($id){
        $jkontak = jenis_kontak::find($id)->delete();
        Session::flash('jkontak_hapus', 'jenis kontak berhasil dihapus !!!');
        return redirect('/master_contact');
    }
}
