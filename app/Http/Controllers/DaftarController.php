<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Gender;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarController extends Controller
{
    public $daftar;
    public function __construct()
    {
       $this->daftar = new Siswa();
       
       
    }
    public function index()
    {
        $agama = Agama::all();
        $jurusan = Jurusan::all();
        $gender = Gender::all();

        //Alert::success('Success Title', 'Success Message');
        return view('daftar', compact('agama', 'jurusan', 'gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $no_reg = "R-".rand(100, 999);
        $this->daftar->nama_siswa = $request->nama;
        $this->daftar->alamat = $request->alamat;
        $this->daftar->asal_sekolah = $request->asal;
        $this->daftar->gender_id = $request->jk;
        $this->daftar->agama_id = $request->agama;
        $this->daftar->no_reg = $no_reg;
        $this->daftar->jurusan_id = $request->jurusan;
        
        $this->daftar->save();
        Alert::success('Register Berhasil', 'Silahkan tunggu info selanjutnya'); 
       
        return redirect()->route('home');
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
}
