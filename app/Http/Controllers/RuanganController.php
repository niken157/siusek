<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $ruangan = DB:: table('ruangan') ->get();
        return view ('ruangan.ruangan',['ruangan'=> $ruangan]);
    }
    public function cetak_ruangan()
    {
        $ruangan = DB:: table('ruangan')
         ->get();
        return view ('cetak_ruangan',['ruangan'=> $ruangan]);
    }
    public function cetakruangan($id_ruangan)
    {
        $setting = DB:: table('setting') ->first();
        $ruangan = DB:: table('ruangan')
        ->where('id_ruangan', $id_ruangan)
        ->first();
        return view ('cetakruangan',['ruangan'=> $ruangan,'setting'=> $setting]);
    }
    public function pengawas()
    {
        $setting = DB:: table('setting') ->first();
        $ruangan = DB:: table('ruangan') ->first();
        return view ('pengawas',['ruangan'=> $ruangan,'setting'=> $setting]);
    }
    public function panitia()
    {
        $setting = DB:: table('setting') ->first();
        $ruangan = DB:: table('ruangan') ->first();
        return view ('panitia',['ruangan'=> $ruangan,'setting'=> $setting]);
    }
    public function cetak_amplop($id_ruangan)
    {
        // $ujian = DB::table('peserta')
        //              ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
        //              ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
        //              ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
        //              ->where('id_ruangan', $id_ruangan)
        //              ->groupBy('ruangan.keterangan_ruangan')
        //             ->first();
        $ruangan = DB:: table('ruangan') ->first();
        return view ('cetak_amplop',['ruangan'=> $ruangan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.tambah_ruangan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keterangan_ruangan' => 'required|unique:ruangan|max:50',
            'nama_ruangan' => 'required|unique:ruangan|max:50',
            'jumlah_PC' => 'required',
            'cadangan_pc' => 'required',
            'keterangan' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        }
        DB::table('ruangan')->insert([
            'keterangan_ruangan' => $request-> keterangan_ruangan,
            'nama_ruangan' => $request-> nama_ruangan,
            'jumlah_PC' => $request-> jumlah_PC,
            'cadangan_pc' => $request-> cadangan_pc,
            'keterangan' => $request-> keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/ruangan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruangan = DB::table('ruangan')
        ->where('id_ruangan', $id)
        ->first();
        // passing data ruangan yang didapat ke view edit_ruangan.blade.php
        return view('ruangan.edit_ruangan' , ['ruangan' => $ruangan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'keterangan_ruangan' => 'required|unique:ruangan|max:50',
        //     'nama_ruangan' => 'required|unique:ruangan|max:50',
        //     'jumlah_PC' => 'required',
        //     'created_at' => 'required',
        //     'updated_at' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return back()->withInput($request->all())->withErrors($validator);
        // }
       //update data ruangan berdasarkan id
       DB::table('ruangan')->where('id_ruangan', $request->id_ruangan)->update([
            // 'id_ruangan' => $request-> id_ruangan,
            'keterangan_ruangan' => $request-> keterangan_ruangan,
            'nama_ruangan' => $request-> nama_ruangan,
            'jumlah_PC' => $request-> jumlah_PC,
            'cadangan_pc' => $request-> cadangan_pc,
            'keterangan' => $request-> keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at

    ]);
    //alihkan ke halaman home
    return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus (string $id)
    {
         //menghapus data ruangan berdasarkan id
         DB::table('ruangan')->where('id_ruangan', $id)->delete();
         return redirect('/ruangan');
    }
}
