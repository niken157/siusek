<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UjianController extends Controller
{

    public function index()
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    // ->where('keterangan', 'pinjam')
                    ->get();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('ujian.ujian',['ujian' => $ujian]);//variabel passing
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ujian.tambah_ujian');
    }
    public function store(Request $request)
    {
        DB::table('ujian')->insert([
            'id_ujian' => $request->id_ujian,
            'id_peserta' => $request->id_peserta,
            'id_ruangan' => $request->id_ruangan,
            'id_sesi' => $request->id_sesi,
            'nomor_pc' => $request->nomor_pc,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/ujian');
    }


    // public function show($id_peminjam)
    // {
    //     //untuk melihat detail dari peminjaman sesuai id_peminjam
    //     $peminjaman = DB::table('buku')
    //                 ->join('peminjaman', 'peminjaman.id', '=', 'buku.id')
    //                 ->where('id_peminjam', $id_peminjam)
    //                 ->get();
    //     // passing data peminjaman yang didapat ke view/pages detail.blade.php
    //     return view('pages.detail' , ['peminjaman' => $peminjaman]);
    // }

    public function edit($id_ujian)
    {
        //mengambil data peminjaman berdasarkan id yang dipilih
        $ujian = DB::table('peserta')
                    ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                    ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                    ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    ->where('id_ujian', $id_ujian)
                    ->first();
        // passing data peminjaman yang didapat ke view/pages edit.blade.php
        return view('ujian.edit_ujian' , ['ujian' => $ujian]);
    }
    public function update(Request $request)
    {
        //update data peminjaman berdasarkan id
        DB::table('ujian')->where('id_ujian',$request->id_ujian)->update([
            'id_ujian' => $request->id_ujian,
            'id_peserta' => $request->id_peserta,
            'id_ruangan' => $request->id_ruangan,
            'id_sesi' => $request->id_sesi,
            'nomor_pc' => $request->nomor_pc,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        //alihkan ke halaman home
        return redirect('/ujian');
    }

    public function hapus($id_ujian)
    {
        //menghapus data peminjaman berdasarkan id
            DB::table('ujian')->where('id_ujian', $id_ujian)->delete();
            return redirect('/ujian');
    }
}
