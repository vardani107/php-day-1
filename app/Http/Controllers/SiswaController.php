<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\siswa;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
//     public function __construct(){
//         $this->middleware(['auth','admin']);
//         $this->middleware(['auth', 'walas'])->only(['index','show']);
//         $this->middleware(['auth','siswa']);
//     }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('mastersiswa');
        $data = siswa::all();
        return view ('mastersiswa' , compact('data'));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('view_c.c_siswa');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        // eror
        $message= [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ': attribute maksimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];

        // validasi
        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'about' => 'required|min:10'
        ], $message);

        //ambil informasi file yang diupload
        $file = $request->file('foto');

        //rename
        $nama_file = time() . "_" . $file->getClientOriginalName();
        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        //insert data
        siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'foto' => $nama_file, 
            'about' => $request->about
        ]);

        Session::flash('success', 'data anda tersimpan !!!' );
        return redirect('master_siswa');
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
        $siswa = siswa::find($id);
        $kontaks = $siswa->kontak()->get();
        // return ($kontaks);
        return view ('view_c.s_siswa', compact('siswa', 'kontaks'));
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
        $siswa=siswa::find($id);
        return view ('view_c.e_siswa', compact('siswa'));

        
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
        $message = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe jpg,png,jpeg'
        ];

        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
            'about' => 'required|min:10'
        ], $message);

        if ($request->foto != '') {
            $siswa = Siswa::find($id);
            file::delete('./template/img/' . $siswa->foto);

            //ambil informasi file yang diupload
            $file = $request->file('foto');

            //rename
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload, $nama_file);

            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->foto = $nama_file;
            $siswa->save();
            return redirect('master_siswa');

            
        } else {
            $siswa=siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->save();
            return redirect('master_siswa');

        };
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
        //
        $siswa = siswa::find($id)->delete();
        Session::flash('danger', 'data berhasil dihapus !!!');
        return redirect('master_siswa');
    }

}
