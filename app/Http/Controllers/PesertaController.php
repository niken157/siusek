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
    public function upas()
	{

		$upas = DB::table('peserta')
        ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
        ->get();//menangkap

		return view('upas.userpass',['upas' => $upas]);//variabel passing

	}

	// method untuk menampilkan view form tambah peserta
	public function tambah()
	{

		// memanggil view tambah
		return view('peserta.tambah_peserta');

	}
    public function tambah_up()
	{
        $setting = DB:: table('setting') ->first();
		// memanggil view tambah
		return view('upas.tambah_upas',['setting' => $setting]);

	}

	// method untuk insert data ke table peserta
	public function store(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:peserta|integer',
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
		return redirect('/peserta');

	}
    public function store_up(Request $request)
    {
        DB::table('upas')->insert([
            'id_peserta' => $request->id_peserta,
            'username' => $request->username,
            'pass' => $request->pass,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/userpass');
    }
    public function generate(Request $request)
    {
        $setting = DB:: table('setting') ->first();
        $u = DB::table('peserta')
            ->get();
        $no=1;
            for ($x = 0; $x <= count($u); $x++) {
                $peserta = DB::table('peserta')
                    //   ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
                     ->where('id_peserta', 'id_peserta')
                    ->get();
                    foreach ($peserta as $key => $value) {
                        $id_peserta= $key->id_peserta;
                    }
                if ($setting->tipe_user == 'random') {
                    $user = 'abcdefghijklmnopqrstuvwxyz123456789';
                    $usern  = substr(str_shuffle($user), 0, $setting->jumlah_pass);
                }else{
                    $usern='nis';
                }
                if ($setting->tipe_pass == 'Angka') {
                    $ps = '123456789';
                } else if ($setting->tipe_pass == 'Kombinasi') {
                    $ps = 'abcdefghijklmnopqrstuvwxyz123456789';
                } else {
                    $ps = 'abcdefghijklmnopqrstuvwxyz';
                }

                $created_at=date('Y-m-d h:i:s');
                $updated_at=date('Y-m-d h:i:s');
                $pss  = substr(str_shuffle($ps), 0, $setting->jumlah_pass);
        //foreach ($u as $key => $value) {
        DB::table('upas')->insert([
            // 'id_peserta' => $u->id_peserta,
            'id_peserta' => $no++,
            'username' => $usern,
            'pass' => $pss,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]);
    }
        return redirect('/userpass')
        ->with('success','Post updated successfully');
    }
	// method untuk edit data peserta
	public function edit($id_peserta)
	{
		// mengambil data peserta berdasarkan id yang dipilih
		$peserta = DB::table('peserta')->where('id_peserta',$id_peserta)->first();
		// passing data peserta yang didapat ke view edit.blade.php
		return view('peserta.edit_peserta',['peserta' => $peserta]);

	}
    public function edit_up($id_kartu)
	{
        $setting = DB:: table('setting') ->first();
		// mengambil data peserta berdasarkan id yang dipilih
        $upas = DB::table('peserta')
        ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
        ->where('id_kartu',$id_kartu)
        ->first();
		// $upas = DB::table('upas')->where('id_kartu',$id_kartu)->first();
		// passing data peserta yang didapat ke view edit.blade.php
		return view('upas.edit_upas',['upas' => $upas,'setting' => $setting]);

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
		return redirect('/peserta');
	}
    public function update_up(Request $request)
	{
		// update data peserta
		DB::table('upas')->where('id_kartu',$request->id_kartu)->update([
            'id_peserta' => $request->id_peserta,
            'username' => $request->username,
            'pass' => $request->pass,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
		return redirect('/userpass');
	}

	// method untuk hapus data peserta
	public function hapus($id_peserta)
	{
		DB::table('peserta')->where('id_peserta',$id_peserta)->delete();

		return redirect('/peserta');
	}
    public function hapus_up($id_kartu)
	{
		DB::table('upas')->where('id_kartu',$id_kartu)->delete();

		return redirect('/userpass');
	}
    public function hapus_s()
	{
		DB::table('peserta')->truncate();

		return redirect('/peserta');
	}
    public function hapus_all()
	{
		DB::table('upas')->truncate();

		return redirect('/userpass');
	}
}
?>
