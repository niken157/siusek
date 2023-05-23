<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UjianController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     ->join('upas', 'upas.id_peserta', '=', 'peserta.id_peserta')
                     //->groupBy('peserta.id_peserta')
                     ->orderBy('peserta.kelas', 'ASC')
                     // ->orderBy('peserta.nama_peserta', 'ASC')
                     ->orderBy('sesi.nama_sesi', 'ASC')
                      ->orderBy('ruangan.nama_ruangan', 'ASC')
                      ->orderBy('peserta.nama_peserta', 'ASC')
                //   ->orderBy('ujian.nomor_pc', 'ASC')
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
                     ->groupBy('ruangan.keterangan_ruangan', 'sesi.nama_sesi')
                     ->orderBy('nama_sesi', 'asc')
                     ->orderBy('nama_ruangan', 'asc')
                    ->get();
            $peserta = DB::table('peserta')
                    ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                    ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                    ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    ->groupBy('ruangan.keterangan_ruangan', 'sesi.nama_sesi','peserta.id_peserta')
                    ->get();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('daftar_hadir',['ujian' => $ujian,'peserta' => $peserta]);//variabel passing
    }
    public function cetak($nama_ruangan,$nama_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    //  ->where('ruangan.nama_ruangan', $nama_ruangan)
                     ->where([
                        ['ruangan.nama_ruangan', '=', $nama_ruangan],
                        ['sesi.nama_sesi', '=', $nama_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('print_absen',['ujian' => $ujian, 'nama_ruangan' => $nama_ruangan, 'nama_sesi' => $nama_sesi,'setting' => $setting]);//variabel passing
    }
    public function berita(){
        $setting = DB:: table('setting') ->first();
        $ujian = DB::table('peserta')
        ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
        ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
        ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
        ->groupBy('ruangan.keterangan_ruangan', 'sesi.nama_sesi')
        ->orderBy('nama_sesi', 'asc')
        ->orderBy('nama_ruangan', 'asc')
       ->get();
        return view ('berita',['setting'=> $setting,'ujian'=>$ujian]);
    }
    public function berita_acara($nama_ruangan,$nama_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     ->where([
                        ['ruangan.nama_ruangan', '=', $nama_ruangan],
                        ['sesi.nama_sesi', '=', $nama_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            $tabel_berita_acara = DB:: table('tabel_berita_acara') ->first();
            return view('berita_acara',['ujian' => $ujian, 'nama_ruangan' => $nama_ruangan, 'nama_sesi' => $nama_sesi,'setting' => $setting,'sesi'=>$sesi,'tabel_berita_acara'=>$tabel_berita_acara]);//variabel passing
    }
    public function edit_berita_acara($nama_ruangan,$nama_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     ->where([
                        ['ruangan.nama_ruangan', '=', $nama_ruangan],
                        ['sesi.nama_sesi', '=', $nama_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            $tabel_berita_acara = DB:: table('tabel_berita_acara') ->first();
            return view('edit_berita_acara',['ujian' => $ujian, 'nama_ruangan' => $nama_ruangan, 'nama_sesi' => $nama_sesi,'setting' => $setting,'sesi'=>$sesi,'tabel_berita_acara'=>$tabel_berita_acara]);//variabel passing
    }
    public function store_ba(Request $request)
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
        DB::table('tabel_berita_acara')->insert([
            'id_ba' => $request->id_ba,
            'nama_ruangan' => $request->nama_ruangan,
            'nama_sesi' => $request->nama_sesi,
            'hadir' => $request->hadir,
            'tdk_hadir' => $request->tdk_hadir,
            'nama' => $request->nama[$row],
            'catatan' => $request->catatan,
             'ttd' => $signature,
            'pengawas' => $request->pengawas,
            'nip' => $request->nip,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
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
            ['nama_ruangan', '=', $request->nama_ruangan],
            ['nama_sesi', '=', $request->nama_sesi] ])
        ->update([

            'nama_ruangan' => $request->nama_ruangan,
            'nama_sesi' => $request->nama_sesi,
            'hadir' => $request->hadir,
            'tdk_hadir' => $request->tdk_hadir,
            'nama' => $request->nama[$row],
            'catatan' => $request->catatan,
            'ttd' => $signature,
            'pengawas' => $request->pengawas,
            'nip' => $request->nip,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
    }
        return redirect('/berita');
    }
    public function cetak_berita($nama_ruangan,$nama_sesi)
    {
            // $ujian = DB::table('peserta')
            //          ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
            //          ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
            //          ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
            //         //  ->where('ruangan.nama_ruangan', $nama_ruangan)
            //          ->where([
            //             ['ruangan.nama_ruangan', '=', $nama_ruangan],
            //             ['sesi.nama_sesi', '=', $nama_sesi] ])
            //          ->orderBy('nomor_pc', 'asc')
            //         ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            $tabel_berita_acara = DB:: table('tabel_berita_acara')
            ->where([
                         ['nama_ruangan', '=', $nama_ruangan],
                         ['nama_sesi', '=', $nama_sesi] ])
            ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('print_berita',['nama_ruangan' => $nama_ruangan, 'nama_sesi' => $nama_sesi,'setting' => $setting,'sesi'=>$sesi,'tabel_berita_acara'=>$tabel_berita_acara]);//variabel passing
    }
    public function cetak_berita2($nama_ruangan,$nama_sesi)
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                    //  ->where('ruangan.nama_ruangan', $nama_ruangan)
                     ->where([
                        ['ruangan.nama_ruangan', '=', $nama_ruangan],
                        ['sesi.nama_sesi', '=', $nama_sesi] ])
                     ->orderBy('nomor_pc', 'asc')
                    ->get();
            $setting = DB:: table('setting') ->first();
            $sesi = DB:: table('sesi') ->first();
            //tampilkan view barang dan kirim ujiannya ke view tersebut
            return view('printberita',['ujian' => $ujian, 'nama_ruangan' => $nama_ruangan, 'nama_sesi' => $nama_sesi,'setting' => $setting,'sesi'=>$sesi]);//variabel passing
    }
    public function kartu()
    {
            $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     ->join('upas', 'upas.id_peserta', '=', 'peserta.id_peserta')
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
        $validator = Validator::make($request->all(), [
            'keterangan_ruangan' => 'required|unique:ruangan|max:50',
            'nama_ruangan' => 'required|unique:ruangan|max:50',
            'jumlah_PC' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        DB::table('ujian')->insert([
            'id_ujian' => $request->id_ujian,
            'id_peserta' => $request->id_peserta,
            'id_ruangan' => $request->id_ruangan,
            'id_sesi' => $request->id_sesi,
            'nomor_pc' => $request->nomor_pc,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/kartu_peserta');
    }
    public function generate(Request $request)
    {
    //     // if (App\Models\User::where('id', 1)->doesntExist()) {
    //     //     // no user with ID of 1 exists
    //     // } else {
    //     //     // user with ID of 1 exists
    //     // }

    //     DB::table('ujian')->truncate();
    //     $ruangan = DB::table('ruangan')
    //         ->where('keterangan', '=', 'ya')
    //         ->get();
    //     $jumlah_peserta = DB::table('peserta')->count();//banyak peserta
    //     $jumlah_semua_pc= $ruangan->sum('jumlah_PC');//total pc tersedia
    //     $no=1;
    //     $jumlah_sesi = $jumlah_peserta / $jumlah_semua_pc ; //jumlah peserta dibagi jumlah pc
    //     for ($i=1; $i <= ceil($jumlah_sesi) ; $i++) {//hasil jumlah sesi dibulatkan
    //         //echo "sesi $i ";
    //         $pc = DB::table('ruangan')
    //         ->where('keterangan', '=', 'ya')
    //         ->limit(1)
    //         //->offset(1)
    //         ->get();
    //         for ($j=1; $j <= count($ruangan) ; $j++) { //banyaknya ruangan yang di pakai
    //             //echo "ruangan $j ";
    //             $off=1;
    //             foreach ($pc as $r) {//perulangan memanggil banyak pc per ruangan

    //             for ($k=1; $k <= $r->jumlah_PC ; $k++) {//jumlah pc per ruangan
    //                 //echo "pc $k ";
    //                 $created_at=date('Y-m-d h:i:s');
    //                 $updated_at=date('Y-m-d h:i:s');
    //             DB::table('ujian')->insert([
    //                 'id_peserta' => $no++,
    //                 'id_ruangan' => $j,
    //                 'id_sesi' => $i,
    //                 'nomor_pc' => $k,
    //                 'created_at' => $created_at,
    //                 'updated_at' => $updated_at
    //             ]);

    //             }
    //         }$pc = DB::table('ruangan')
    //         ->where('keterangan', '=', 'ya')
    //         ->limit(1)
    //         ->offset($j)
    //         ->get();
    //         }
    //     }
    //     return redirect('/kartu_peserta');

    // $ruangan = DB::table('ruangan')
    //         ->where('keterangan', '=', 'ya')
    //         ->get();
    // $no=1;
    // $jumlah_peserta = DB::table('peserta')->count();//banyak peserta
    // $jumlah_semua_pc= $ruangan->sum('jumlah_PC');//total pc tersedia
    // echo "<br>";
    // $ss = DB::table('peserta')->orderBy('id_peserta', 'desc')->limit(1)->get();
    // //echo $ss->id_peserta;
    // $jumlah_sesi = $jumlah_peserta / $jumlah_semua_pc ; //jumlah peserta dibagi jumlah pc
    // for ($i=1; $i <= ceil($jumlah_sesi) ; $i++) {//hasil jumlah sesi dibulatkan
    //     $ru = DB::table('ruangan')
    //     ->where('keterangan', '=', 'ya')
    //     ->limit(1)
    //     ->get();
    //     echo "<br>";
    //     echo "sesi $i ";
    //     for ($j=1; $j <= count($ruangan) ; $j++) { //banyaknya ruangan yang di pakai ya
    //         echo "<br>";
    //         echo "ruangan $j ";
    //         // $ss = DB::table('peserta')
    //         //     ->limit(1)
    //         //     ->get();
    //         foreach ($ru as $r) {//perulangan memanggil banyak pc per ruangan
    //         for ($k=1; $k <= $r->jumlah_PC ; $k++) {//jumlah pc per ruangan
    //             echo "pc $k ";
    //             echo "siswa ",$no++," ";
                // for ($s=1; $s <= count($ss) ; $s++) {//jumlah siswa
                //     echo "siswa $s ";
                //     $ss = DB::table('peserta')
                //     ->limit(1)
                //     ->offset(1)
                //     ->get();
                // }

        //         $ru = DB::table('ruangan')
        //     ->where('keterangan', '=', 'ya')
        //     ->limit(1)
        //     ->offset($j)
        //     ->get();

        //     }
        //     }

        // }


    //}
        // $ruangan = DB::table('ruangan')
        //     ->where('keterangan', '=', 'ya')
        //     ->get();
        // $peserta = DB::table('peserta')
        // ->orderBy('kelas', 'ASC')
        // ->orderBy('nis', 'ASC')
        // ->get();
        // $jumlah_peserta = DB::table('peserta')->count();//banyak peserta
        // $jumlah_semua_pc= $ruangan->sum('jumlah_PC');//total pc tersedia
        // $j=1;
        // $jumlah_sesi = $jumlah_peserta / $jumlah_semua_pc ; //jumlah peserta dibagi jumlah pc
        // $created_at=date('Y-m-d h:i:s');
        // $updated_at=date('Y-m-d h:i:s');

        // foreach ($peserta as $p) {//perulangan siswa

        //     $ru = DB::table('ruangan')
        //     ->where('keterangan', '=', 'ya')
        //     ->limit(1)
        //     //->offset(1)
        //     ->get();
        //     foreach($ru as $r){//perulangan ruangan
        //         $ujian=DB::table('ujian')
        //                 ->where('id_peserta', '=', $p->id_peserta)
        //                 ->where('id_ruangan', '=', $r->id_ruangan)
        //                 ->first();
        //         if (!$ujian) {
        //             for ($k=1; $k <= $r->jumlah_PC ; $k++) {//jumlah pc per ruangan
        //             $tambah[]=[
        //                 'id_peserta' => $p->id_peserta,
        //                 'id_ruangan' => $j,
        //                 'id_sesi' => 1,
        //                 'nomor_pc' => $k,
        //                 'created_at' => $created_at,
        //                 'updated_at' => $updated_at
        //             ];

        //         }

        //         }

        //      $j++;
        //      $ru = DB::table('ruangan')
        //     ->where('keterangan', '=', 'ya')
        //     ->limit(1)
        //     ->offset($j)
        //     ->get();


        //     }

            // DB::table('ujian')->insert($tambah);

        // }
        // var_dump($tambah);
        //return redirect('/kartu_peserta');

        // $sesi=DB::table('sesi')->get();
        // $ruangan=DB::table('ruangan')->where('keterangan', '=', 'ya')->get();
        // //$no=1;
        // $jumlah_pc_sebelumnya=0;
        // foreach ($sesi as $s) {
        //     foreach ($ruangan as $r){
        //         $peserta=DB::table('peserta')
        //         ->leftJoin('ujian','ujian.id_peserta','=','peserta.id_peserta')
        //         ->select('peserta.id_peserta AS id_peserta_ujian','peserta.id_peserta','peserta.nama_peserta','peserta.kelas')
        //         ->whereNull('ujian.id_peserta')
        //         ->limit($r->jumlah_PC)->offset($jumlah_pc_sebelumnya)->get();
        //         $nopc=1;
        //         foreach ($peserta as $p) {
        //             $data['peserta'][$s->nama_sesi][$r->nama_ruangan][]="| pc ".$nopc."|".$p->id_peserta."-".$p->nama_peserta."-".$p->kelas;
        //             $nopc++;
        //             $jumlah_pc_sebelumnya++;
        //         }
        //         //$no++;
        //         // $peserta=DB::table('peserta')
        //         //     ->leftJoin('ujian','ujian.id_peserta','=','peserta.id_peserta')
        //         //     ->select('peserta.id_peserta AS id_peserta_ujian','peserta.id_peserta','peserta.nama_peserta','peserta.kelas')
        //         //     ->whereNull('ujian.id_peserta')
        //         //     ->limit($r->jumlah_PC)->offset($no*$r->jumlah_PC)->get();
        //     }
        // }
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        DB::table('ujian')->truncate();
        $ruangan = DB::table('ruangan')
            ->where('keterangan', '=', 'ya')
            ->get();
        $sesi=DB::table('sesi')->get();
        $jumlah_pc_sebelumnya=0;
        $created_at=date('Y-m-d h:i:s');
        $updated_at=date('Y-m-d h:i:s');
        $pp=DB::table('peserta')
                ->leftJoin('ujian','ujian.id_peserta','=','peserta.id_peserta')
                ->select('peserta.id_peserta AS id_peserta_ujian','peserta.id_peserta','peserta.nama_peserta','peserta.kelas')
                ->whereNull('ujian.id_peserta')
                ->orderBy('peserta.kelas', 'ASC')
                ->orderBy('peserta.nama_peserta', 'ASC')
                ->get();
        foreach ($sesi as $s) {
            foreach ($ruangan as $r){
                $peserta=DB::table('peserta')
                ->leftJoin('ujian','ujian.id_peserta','=','peserta.id_peserta')
                ->select('peserta.id_peserta AS id_peserta_ujian','peserta.id_peserta','peserta.nama_peserta','peserta.kelas')
                ->whereNull('ujian.id_peserta')
                ->orderBy('peserta.kelas', 'ASC')
                ->orderBy('peserta.nama_peserta', 'ASC')
                ->limit($r->jumlah_PC)->offset($jumlah_pc_sebelumnya)->get();
                $nopc=1;
                foreach ($peserta as $p) {
                    $data[]=[
                                        'id_peserta' => $p->id_peserta,
                                        'id_ruangan' => $r->id_ruangan,
                                        'id_sesi' => $s->id_sesi,
                                        'nomor_pc' => $nopc,
                                        'created_at' => $created_at,
                                        'updated_at' => $updated_at
                                    ];

                    $nopc++;
                    $jumlah_pc_sebelumnya++;
                }
            }

        }
        if ($pp->isEmpty()) {
            //Alert::success('Congrats', 'You\'ve Successfully Registered');
            Alert::warning('Tidak Ada Proses', 'Semua Peserta Sudah Tergenerate');
        }else{
            DB::table('ujian')->insert($data);
            alert()->success('Proses Berhasil','Pembagian Kartu Semua Peserta Telah Digenerate.');
        }
        return redirect('/kartu_peserta');
    }


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
                    ->join('upas', 'upas.id_peserta', '=', 'peserta.id_peserta')
                    ->where('id_ujian', $id_ujian)
                    ->groupBy('peserta.id_peserta')
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
                    ->join('upas', 'upas.id_peserta', '=', 'peserta.id_peserta')
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
    public function hapus_digital($nama_ruangan,$nama_sesi)
    {
        //menghapus data peminjaman berdasarkan id
            DB::table('tabel_berita_acara')
            ->where([
                ['nama_ruangan', '=', $nama_ruangan],
                ['nama_sesi', '=', $nama_sesi] ])
            ->delete();
            return redirect('/berita');
    }
    public function hapus_all()
	{
		DB::table('ujian')->truncate();
        alert()->info('Berhasil Menghapus','Data Semua Pembagian Kartu Peserta Telah Berhasil Dihapus');
		return redirect('/kartu_peserta');
	}
}
