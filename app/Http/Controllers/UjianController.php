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
                     ->join('tabel_kartu', 'tabel_kartu.id_peserta', '=', 'peserta.id_peserta')
                     ->groupBy('peserta.id_peserta')
                    //  ->join('tabel_berita_acara', 'tabel_berita_acara.id_ruangan', '=', 'ruangan.id_ruangan' 'tabel_berita_acara.id_sesi', '=', 'sesi.id_sesi')
                    ->get();
                    $setting = DB:: table('setting') ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('ujian.ujian',['ujian' => $ujian,'setting' => $setting]);//variabel passing
    }
    public function absen()
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     ->groupBy('ruangan.nama_ruangan', 'sesi.no_sesi')
                     ->orderBy('nomer_ruangan', 'asc')
                    ->get();
            $peserta = DB::table('peserta')
                    ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                    ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                    ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    ->groupBy('ruangan.nama_ruangan', 'sesi.no_sesi','peserta.id_peserta')
                    ->get();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('daftar_hadir',['ujian' => $ujian,'peserta' => $peserta]);//variabel passing
    }
    public function cetak($nomer_ruangan,$no_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    //  ->where('ruangan.nomer_ruangan', $nomer_ruangan)
                     ->where([
                        ['ruangan.nomer_ruangan', '=', $nomer_ruangan],
                        ['sesi.no_sesi', '=', $no_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('print_absen',['ujian' => $ujian, 'nomer_ruangan' => $nomer_ruangan, 'no_sesi' => $no_sesi,'setting' => $setting]);//variabel passing
    }
    public function berita(){
        $setting = DB:: table('setting') ->first();
        $ujian = DB::table('peserta')
        ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
        ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
        ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
        ->groupBy('ruangan.nama_ruangan', 'sesi.no_sesi')
        ->orderBy('nomer_ruangan', 'asc')
       ->get();
        return view ('berita',['setting'=> $setting,'ujian'=>$ujian]);
    }
    public function berita_acara($nomer_ruangan,$no_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    //  ->where('ruangan.nomer_ruangan', $nomer_ruangan)
                     ->where([
                        ['ruangan.nomer_ruangan', '=', $nomer_ruangan],
                        ['sesi.no_sesi', '=', $no_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            $tabel_berita_acara = DB:: table('tabel_berita_acara') ->first();
            return view('berita_acara',['ujian' => $ujian, 'nomer_ruangan' => $nomer_ruangan, 'no_sesi' => $no_sesi,'setting' => $setting,'sesi'=>$sesi,'tabel_berita_acara'=>$tabel_berita_acara]);//variabel passing
    }
    public function edit_berita_acara($nomer_ruangan,$no_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    //  ->where('ruangan.nomer_ruangan', $nomer_ruangan)
                     ->where([
                        ['ruangan.nomer_ruangan', '=', $nomer_ruangan],
                        ['sesi.no_sesi', '=', $no_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            $tabel_berita_acara = DB:: table('tabel_berita_acara') ->first();
            return view('edit_berita_acara',['ujian' => $ujian, 'nomer_ruangan' => $nomer_ruangan, 'no_sesi' => $no_sesi,'setting' => $setting,'sesi'=>$sesi,'tabel_berita_acara'=>$tabel_berita_acara]);//variabel passing
    }
    public function store_ba(Request $request)
    {
        // $folderPath = public_path('upload/');
        // $image_parts = explode(";base64,", $request->signed);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);
        // $file = $folderPath . uniqid() . '.'.$image_type;
        // file_put_contents($file, $image_base64);

        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.'.$image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        foreach ($request->nama as $row => $val) {
        DB::table('tabel_berita_acara')->insert([
            'id_ba' => $request->id_ba,
            'nomer_ruangan' => $request->nomer_ruangan,
            'no_sesi' => $request->no_sesi,
            'hadir' => $request->hadir,
            'tdk_hadir' => $request->tdk_hadir,
            'nama' => $request->nama[$row],
            'catatan' => $request->catatan,
             'ttd' => $signature,
            'pengawas' => $request->pengawas,
            'nip' => $request->nip,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
    }
        return redirect('/berita');
    }
    public function update_ba(Request $request)
    {

        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.'.$image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        foreach ($request->nama as $row => $val) {
        DB::table('tabel_berita_acara')
        ->where([
            ['nomer_ruangan', '=', $request->nomer_ruangan],
            ['no_sesi', '=', $request->no_sesi] ])
        ->update([

            'nomer_ruangan' => $request->nomer_ruangan,
            'no_sesi' => $request->no_sesi,
            'hadir' => $request->hadir,
            'tdk_hadir' => $request->tdk_hadir,
            'nama' => $request->nama[$row],
            'catatan' => $request->catatan,
             'ttd' => $signature,
            'pengawas' => $request->pengawas,
            'nip' => $request->nip,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
    }
        return redirect('/berita');
    }
    public function cetak_berita($nomer_ruangan,$no_sesi)
    {
            // $ujian = DB::table('peserta')
            //          ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
            //          ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
            //          ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
            //         //  ->where('ruangan.nomer_ruangan', $nomer_ruangan)
            //          ->where([
            //             ['ruangan.nomer_ruangan', '=', $nomer_ruangan],
            //             ['sesi.no_sesi', '=', $no_sesi] ])
            //          ->orderBy('nomor_pc', 'asc')
            //         ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            $tabel_berita_acara = DB:: table('tabel_berita_acara')
            ->where([
                         ['nomer_ruangan', '=', $nomer_ruangan],
                         ['no_sesi', '=', $no_sesi] ])
            ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('print_berita',['nomer_ruangan' => $nomer_ruangan, 'no_sesi' => $no_sesi,'setting' => $setting,'sesi'=>$sesi,'tabel_berita_acara'=>$tabel_berita_acara]);//variabel passing
    }
    public function cetak_berita2($nomer_ruangan,$no_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    //  ->where('ruangan.nomer_ruangan', $nomer_ruangan)
                     ->where([
                        ['ruangan.nomer_ruangan', '=', $nomer_ruangan],
                        ['sesi.no_sesi', '=', $no_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('printberita',['ujian' => $ujian, 'nomer_ruangan' => $nomer_ruangan, 'no_sesi' => $no_sesi,'setting' => $setting,'sesi'=>$sesi]);//variabel passing
    }
    public function kartu()
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     ->join('tabel_kartu', 'tabel_kartu.id_peserta', '=', 'peserta.id_peserta')
                     ->groupBy('peserta.id_peserta')
                    ->get();
            $setting = DB:: table('setting') ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('kartu',['ujian' => $ujian,'setting' => $setting]);//variabel passing
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = DB::table('setting')->first();
        return view('ujian.tambah_ujian',['setting' => $setting]);
    }
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama_ruangan' => 'required|unique:ruangan|max:50',
        //     'nomer_ruangan' => 'required|unique:ruangan|max:50',
        //     'jumlah_PC' => 'required',
        //     'created_at' => 'required',
        //     'updated_at' => 'required',
        // ]);
        DB::table('ujian')->insert([
            'id_ujian' => $request->id_ujian,
            'id_peserta' => $request->id_peserta,
            'id_ruangan' => $request->id_ruangan,
            'id_sesi' => $request->id_sesi,
            'nomor_pc' => $request->nomor_pc,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        DB::table('tabel_kartu')->insert([
            'id_kartu' => $request->id_kartu,
            'id_peserta' => $request->id_peserta,
            'username' => $request->username,
            'pass' => $request->pass,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/kartu_peserta');
    }
    //generator
    public function generate(Request $request)
    {
        $peserta = DB:: table('peserta') ->get();
        $jml_dipilih=count($peserta);
        for ($x = 0; $x <= $jml_dipilih; $x++) {
            DB::table('ujian')->insert([
                    'id_ujian' => $request->id_ujian[$x],
                    'id_peserta' => $request->id_peserta[$x],
                    'id_ruangan' => $request->id_ruangan[$x],
                    'id_sesi' => $request->id_sesi[$x],
                    'nomor_pc' => $request->nomor_pc[$x],
                    'created_at' => $request->created_at[$x],
                    'updated_at' => $request->updated_at[$x]
            ]);
           }

        return redirect('/kartu_peserta');
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
    public function print($id_ujian)
    {
        //mengambil data peminjaman berdasarkan id yang dipilih
        $ujian = DB::table('peserta')
                    ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                    ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                    ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    ->join('tabel_kartu', 'tabel_kartu.id_peserta', '=', 'peserta.id_peserta')
                    ->where('id_ujian', $id_ujian)
                    ->get();
        $setting = DB:: table('setting') ->first();
        // passing data peminjaman yang didapat ke view/pages edit.blade.php
        return view('kartu_satuan' , ['ujian' => $ujian,'setting' => $setting]);
    }
    public function detail($id_ujian)
    {
        //mengambil data peminjaman berdasarkan id yang dipilih
        $ujian = DB::table('peserta')
                    ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                    ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                    ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    ->join('tabel_kartu', 'tabel_kartu.id_peserta', '=', 'peserta.id_peserta')
                    ->where('id_ujian', $id_ujian)
                    ->get();
        $setting = DB:: table('setting') ->first();
        // passing data peminjaman yang didapat ke view/pages edit.blade.php
        return view('kartu_detail' , ['ujian' => $ujian,'setting' => $setting]);
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
        return redirect('/kartu_peserta');
    }

    public function hapus($id_ujian)
    {
        //menghapus data peminjaman berdasarkan id
            DB::table('ujian')->where('id_ujian', $id_ujian)->delete();
            return redirect('/kartu_peserta');
    }
    public function hapus_digital($nomer_ruangan,$no_sesi)
    {
        //menghapus data peminjaman berdasarkan id
            DB::table('tabel_berita_acara')
            ->where([
                ['nomer_ruangan', '=', $nomer_ruangan],
                ['no_sesi', '=', $no_sesi] ])
            ->delete();
            return redirect('/berita');
    }
}
