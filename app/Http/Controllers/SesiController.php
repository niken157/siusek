<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Sesi = DB:: table('sesi') ->get();
        return view ('sesi.sesi',['sesi'=> $Sesi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sesi.tambah_sesi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_sesi' => 'required|unique:sesi|max:11',
            'jam_sesi' => 'required|unique:sesi|',
            'keterangan' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        }
        DB::table('sesi')->insert([
            'no_sesi' => $request-> no_sesi,
            'jam_sesi' => $request-> jam_sesi,
            'keterangan' => $request-> keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
        return redirect('/sesi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_sesi)
    {
         //piye carane gak error
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_sesi)
    {
        $sesi = DB::table('sesi')
        ->where('id_sesi', $id_sesi)
        ->first();

        return view('sesi.edit_sesi' , ['sesi' => $sesi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       //update data sesi berdasarkan id
       DB::table('sesi')->where('id_sesi', $request->id_sesi)->update([
            'id_sesi' => $request-> id_sesi,
            'no_sesi' => $request-> no_sesi,
            'jam_sesi' => $request-> jam_sesi,
            'keterangan' => $request-> keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at

    ]);
    //alihkan ke halaman home
    return redirect('/sesi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus (string $id_sesi)
    {

         DB::table('sesi')->where('id_sesi', $id_sesi)->delete();
         return redirect('/sesi');
    }
}

