
@extends('template')

@section('content')
<?php
if ($setting->tipe_pass == 'Angka') {
    $ps = '123456789';
} else if ($setting->tipe_pass == 'Kombinasi') {
    $ps = 'abcdefghijklmnopqrstuvwxyz123456789';
} else {
    $ps = 'abcdefghijklmnopqrstuvwxyz';
}
$pss  = substr(str_shuffle($ps), 0, $setting->jumlah_pass);
?>
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA UJIAN</h3>
      </div>
    <div class="card-body">
    <form action="/kartu_peserta/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="id_peserta">Nama Peserta Didik :</label>
            <select class="selectpicker" data-live-search="true" name="id_peserta" class="form-select" id="id_peserta" visibleOptions="true">
                @php
                $peserta = DB::table('peserta')->get();
                @endphp
            @foreach($peserta as $p)
            @php
                    $peserta = DB::table('peserta')->get();
                    $u = DB::table('peserta')
                      ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->where('ujian.id_peserta', $p->id_peserta)
                    ->count();
                @endphp
            @if ($u == 0)
                <option value="{{ $p->id_peserta }}">{{ $p->nama_peserta }}</option>
            @endif

            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_ruangan">Nama Ruangan :</label>
            <select name="id_ruangan" class="form-select" id="id_ruangan">
                @php
                    $ruangan = DB::table('ruangan')->get();
                @endphp
            @foreach($ruangan as $p)
            <option value="{{ $p->id_ruangan }}">{{ $p->nama_ruangan }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_sesi">Nama Sesi :</label>
            <select name="id_sesi" class="form-select" id="id_sesi">
                @php
                    $ruangan = DB::table('sesi')->get();
                @endphp
            @foreach($ruangan as $p)
            <option value="{{ $p->id_sesi }}">sesi-{{ $p->no_sesi }} Hari {{ $p->keterangan }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No PC</label>
            <input name="nomor_pc" type="number" class="form-control" id="exampleFormControlInput1" placeholder=""required>
        </div>
        @if ($setting->tipe_user == 'manual')
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Usename Ujian"required>
        </div>
        @elseif ($setting->tipe_user == 'random')
        @php
            $user = 'abcdefghijklmnopqrstuvwxyz123456789';
            $usern  = substr(str_shuffle($user), 0, $setting->jumlah_pass);
        @endphp
        <input type="hidden" name="username" value="<?php echo $usern; ?>">
        @else
        <input type="hidden" name="username" value="nis">
        @endif
        {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="pass" type="text" class="form-control" value="" id="exampleFormControlInput1" placeholder="<?php echo $nomor_sewa; ?>"required>
        </div> --}}
        <input type="hidden" name="pass" value="<?php echo $pss; ?>">
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>
    </div>
  </div>
  @endsection
