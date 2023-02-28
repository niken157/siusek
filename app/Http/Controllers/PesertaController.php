<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PesertaController extends Controller
{
	public function index()
	{
    	// mengambil data dari table peserta
		$peserta = DB::table('peserta')->get();//menangkap

    	// mengirim data peserta ke view index
		return view('peserta.peserta',['peserta' => $peserta]);//variabel passing

	}

	// method untuk menampilkan view form tambah peserta
	public function tambah()
	{

		// memanggil view tambah
		return view('peserta.tambah_peserta');

	}

	// method untuk insert data ke table peserta
	public function store(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:peserta|max:50',
            'nama_peserta' => 'required|unique:peserta|max:50',
            'kelas' => 'required',
			'jurusan' => 'required',
			'jenis_kelamin' => 'required',
			'agama' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator);
        }
		// insert data ke table peserta
		DB::table('peserta')->insert([
			'nis' => $request->nis,
			'nama_peserta' => $request->nama_peserta,
			'kelas' => $request->kelas,
			'jurusan' => $request->jurusan,
			'jenis_kelamin' => $request->jenis_kelamin,
			'agama' => $request->agama,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		// alihkan halaman ke halaman peserta
		return redirect('/peserta');

	}

	// method untuk edit data peserta
	public function edit($id_peserta)
	{
		// mengambil data peserta berdasarkan id yang dipilih
		$peserta = DB::table('peserta')->where('id_peserta',$id_peserta)->first();
		// passing data peserta yang didapat ke view edit.blade.php
		return view('peserta.edit_peserta',['peserta' => $peserta]);

	}

	// update data peserta
	public function update(Request $request)
	{
		// update data peserta
		DB::table('peserta')->where('id_peserta',$request->id_peserta)->update([
			'nis' => $request->nis,
			'nama_peserta' => $request->nama_peserta,
			'kelas' => $request->kelas,
			'jurusan' => $request->jurusan,
			'jenis_kelamin' => $request->jenis_kelamin,
			'agama' => $request->agama,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		// alihkan halaman ke halaman peserta
		return redirect('/peserta');
	}

	// method untuk hapus data peserta
	public function hapus($id_peserta)
	{
		// menghapus data peserta berdasarkan id yang dipilih
		DB::table('peserta')->where('id_peserta',$id_peserta)->delete();

		// alihkan halaman ke halaman peserta
		return redirect('/peserta');
	}
}
