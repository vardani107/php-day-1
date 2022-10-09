<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\siswa;
use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=Siswa::paginate(3);
        // $Project = project::all();
        // return view('Master_project', compact('Project','data'));

        $data = siswa::paginate(5);
        // $project = project::all();
        // return ($project);
        return view('masterproject',  compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view_c.c_project');
    }

    public function tambah($id)
    {
        $siswa = siswa::find($id);
        return view('view_c.Tambahproject', 'compact'('siswa'));
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
        // validasi
        $validateproject = $request->validate( [
            'id_siswa' => 'required',
            'nama_project' => 'required|max:20|min:1',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ],);

        project::create($validateproject);
        Session::flash('Berhasil', 'data anda tersimpan !!!');
        return redirect('/master_project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = siswa::find($id)->project()->get();
        // return view ($project);
        return view('view_c.s_project', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        return view ('view_c.e_project', compact('project'));
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
        // eror
        $message = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ': attribute maksimal :max karakter gaess',
        ];

        // validasi
        $this->validate($request, [
            // 'id_siswa' => '',
            'nama_project' => 'required|max:20|min:1',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ], $message);

        $project=project::find($id);
        $project->nama_project = $request->nama_project;
        $project-> deskripsi  = $request->deskripsi ;
        $project->tanggal = $request->tanggal;
        $project->save();
        
        Session::flash('Berhasil', 'data berhasil di edit !!!');
        return redirect('/master_project');

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
        $project = project::find($id)->delete();
        session::flash('success', 'data berhasil di hapus');
        return redirect('/master_project');
    }
}
