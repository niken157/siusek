
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
        <h3>FORM EDIT DATA USERPASS</h3>
      </div>
    <div class="card-body">
    <form action="/userpass/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_kartu" value="{{ $upas->id_kartu }}">
        <div class="mb-3">
            <label for="id_peserta">Nama Peserta :</label>
            <select class="selectpicker" data-live-search="true" name="id_peserta" class="form-select" id="id_peserta">
                @php
                    $peserta = DB::table('peserta')
                ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
                ->get();
                @endphp
                <option value="{{ $upas->id_peserta }}">{{ $upas->nama_peserta }}</option>
            @foreach($peserta as $p)
            @php
                    $peserta = DB::table('peserta')->get();
                    $u = DB::table('peserta')
                      ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
                     ->where('upas.id_peserta', $p->id_peserta)
                    ->count();
                @endphp
            @if ($u == 0)
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
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">PassWord</label>
            <input name="pass" value="{{ $upas->pass}}" type="text" class="form-control" id="exampleFormControlInput1" placeholder=""required>
        </div>
        {{-- <input type="hidden" name="pass" value="<?php echo $pss; ?>"> --}}
        <input type="hidden" name="created_at" value="{{ $upas->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>
    </div>
  </div>
  @endsection
