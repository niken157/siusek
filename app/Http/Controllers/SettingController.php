<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
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
        $setting = DB:: table('setting') ->first();
        return view ('pengaturan',['setting'=> $setting]);
    }
    // public function ba()
    // {
    //     $setting = DB:: table('setting') ->first();
    //     return view ('berita_acara',['setting'=> $setting]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaturan_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		DB::table('setting')->insert([
			'nama_ujian' => $request->nama_ujian,
			'logo' => $request->logo,
			'tahun_ajaran' => $request->tahun_ajaran,
			'jumlah_pass' => $request->jumlah_pass,
			'tipe_pass' => $request->tipe_pass,
            'tipe_user' => $request->tipe_user,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		return redirect('/pengaturan');
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
        if ($request-> logo) {
            DB::table('setting')->where('id_setting', $request->id_setting)->update([
                'id_setting' => $request-> id_setting,
                'nama_ujian' => $request-> nama_ujian,
                'logo' => $request-> logo,
                'tahun_ajaran' => $request->tahun_ajaran,
                'jumlah_pass' => $request->jumlah_pass,
                'tipe_pass' => $request->tipe_pass,
                'tipe_user' => $request->tipe_user,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at
        ]);
        }else{
            DB::table('setting')->where('id_setting', $request->id_setting)->update([
            'id_setting' => $request-> id_setting,
            'nama_ujian' => $request-> nama_ujian,
            //'logo' => $request-> logo,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jumlah_pass' => $request->jumlah_pass,
            'tipe_pass' => $request->tipe_pass,
            'tipe_user' => $request->tipe_user,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
    ]);
        }

    //alihkan ke halaman home
    alert()->success('Perubahan Berhasil','Pengaturan Berhasil di Ubah.');
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
