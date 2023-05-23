<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kelas = DB:: table('kelas') ->get();
        return view ('kelas.kelas',['kelas'=> $kelas]);
    }
    public function create()
    {
        return view('kelas.tambah_kelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|unique:kelas|max:50',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        }
        DB::table('kelas')->insert([
            'nama_kelas' => $request->nama_kelas,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/kelas');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = DB::table('kelas')
        ->where('id_kelas', $id)
        ->first();
        // passing data kelas yang didapat ke view edit_kelas.blade.php
        return view('kelas.edit_kelas' , ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       //update data kelas berdasarkan id
       DB::table('kelas')->where('id_kelas', $request->id_kelas)->update([
            // 'id_kelas' => $request-> id_kelas,
            'nama_kelas' => $request-> nama_kelas,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at

    ]);
    //alihkan ke halaman home
    return redirect('/kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus (string $id)
    {
         //menghapus data kelas berdasarkan id
         DB::table('kelas')->where('id_kelas', $id)->delete();
         return redirect('/kelas');
    }
}
