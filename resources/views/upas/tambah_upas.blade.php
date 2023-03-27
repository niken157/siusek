
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
        <h3>FORM TAMBAH DATA AKUN PESERTA</h3>
      </div>
    <div class="card-body">
    <form action="/akun_peserta/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="id_peserta">Nama Peserta Didik :</label>
            <select class="selectpicker" data-live-search="true" name="id_peserta" class="form-select" id="id_peserta" visibleOptions="true">
                @php
                $peserta = DB::table('peserta')->get();
                @endphp
            @foreach($peserta as $p)
            @php
                    $u = DB::table('peserta')
                      ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
                     ->where('upas.id_peserta', $p->id_peserta)
                    ->get();
                @endphp
            @if (count($u) == 0)
                <option value="{{ $p->id_peserta }}">{{ $p->nama_peserta }}</option>
            @endif

            @endforeach
            </select>
        </div>
        @if ($setting->tipe_user == 'random')
        @php
            $user = 'abcdefghijklmnopqrstuvwxyz123456789';
            $usern  = substr(str_shuffle($user), 0, $setting->jumlah_pass);
        @endphp
        <input type="hidden" name="username" value="<?php echo $usern; ?>">
        @else
        <input type="hidden" name="username" value="nis">
        @endif
        <input type="hidden" name="pass" value="<?php echo $pss; ?>">
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>
    </div>
  </div>
  @endsection
