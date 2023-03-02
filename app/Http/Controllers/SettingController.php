<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = DB:: table('setting') ->get();
        return view ('pengaturan',['setting'=> $setting]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //
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
    public function edit(string $id_setting)
    {
        $setting = DB::table('setting')
        ->where('id_setting', $id_setting)
        ->first();

        return view('pengaturan_edit' , ['setting' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('setting')->where('id_setting', $request->id_setting)->update([
            'id_setting' => $request-> id_setting,
            'nama_aplikasi' => $request-> nama_aplikasi,
            'logo' => $request-> logo,
            'semester' => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'tahun_ini' => $request-> tahun_ini,
            'bulan' => $request-> bulan

    ]);
    //alihkan ke halaman home
    return redirect('/pengaturan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
