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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            'nama_sesi' => 'required',
            'jam_awal' => 'required',
            'jam_berakhir' => 'required',
            'keterangan' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        }
        DB::table('sesi')->insert([
            'nama_sesi' => $request-> nama_sesi,
            'jam_awal' => $request-> jam_awal,
            'jam_berakhir' => $request-> jam_berakhir,
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
            'nama_sesi' => $request-> nama_sesi,
            'jam_awal' => $request-> jam_awal,
            'jam_berakhir' => $request-> jam_berakhir,
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

