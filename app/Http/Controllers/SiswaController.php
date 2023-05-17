<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Gender;
use App\Models\Jurusan;
use App\Models\Siswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public $siswa;
    public function __construct()
    {
       $this->siswa = new Siswa();
       $this->middleware('auth');
       
    }
    public function index(Request $request)
    {
    
        $cari =  $request->search;
        $siswa = DB::table('siswas')
        ->join('jurusans','siswas.jurusan_id','=','jurusans.id_jurusan')
        ->join('genders','siswas.gender_id','=','genders.id_gender')
        ->join('agamas','siswas.agama_id','=','agamas.id_agama')
        ->select('siswas.*','jurusans.*','agamas.*','genders.*')
        ->where('siswas.nama_siswa','LIKE', "%$cari%")
        ->orWhere('genders.gender','LIKE', "%$cari%")
        ->orWhere('jurusans.jurusan','LIKE', "%$cari%")
        ->get();
        return view('siswa.index',compact('siswa'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


    }

    
    public function show(Siswa $siswa)
    {
        //
    }

   
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $gender = Gender::all();
        $jurusan = Jurusan::all();
        $agama = Agama::all();
        return view('siswa.edit', compact('siswa','gender','jurusan', 'agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Siswa::findOrFail($id);
        
        $rules = [
            'nama' => 'required|min:3|max:50',
            'asal' => 'required|max:50',
            'alamat' => 'required|max:50',
            'jurusan' => 'required|max:15',
            'agama' => 'required|max:100',
            'jk' => 'required|max:100'
            
           ];

        $messages = [
            'required' => ":attribute ga boleh kosong",
            'min' => ":attribute kurang pas input ulang",
            'max' => ":attribute inputan terlalu banyak",
           
            
            
        ];
        $this->validate($request, $rules, $messages);
        
        $update->nama_siswa = $request->nama;
        $update->alamat = $request->alamat;
        $update->asal_sekolah = $request->asal;
        $update->gender_id = $request->jk;
        $update->agama_id = $request->agama;
        $update->no_reg = $request->no_reg;
        $update->jurusan_id = $request->jurusan;
        
        $update->save();
        Alert::success('Edit Berhasil', 'Data siswa berhasil di ubah'); 
        // Alert::success('Success Title', 'Success Message');
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }

    public function delete($id)
    {
        $destroy = Siswa::findOrFail($id);
       
        $destroy->delete();
            
        return redirect()->route('siswa.index');
    }


    public function search(Request $request)
    {
        //
    }
}
