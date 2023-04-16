@extends('template')

@section('content')
<br>
@include('sweetalert::alert')
<div class="card">
    <div class="card-header">
      <h3>PENGATURAN UJIAN</h3>
    </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
        @php
        $s = DB::table('setting')
        ->count();
        @endphp
        @if ($s == 0)
        <a class="btn btn-success" href="/pengaturan_tambah/" role="button"><i class="fas fa-fw fa-plus"></i> Buat Pengaturan</a>
        @else
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA UJIAN </label>
            <input name="nama_ujian" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->nama_ujian }}"readonly>
        </div>
    </div>
    <div class="col">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">TAHUN AJARAN </label>
          <input name="tahun_ajaran" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tahun_ajaran }}"readonly>
      </div>
    </div>
  </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">TIPE PASSWORD </label>
                <input name="tipe_pass" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tipe_pass }}"readonly>
            </div>
              </div>
              <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">JUMLAH PASSWORD </label>
                    <input name="jumlah_pass" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->jumlah_pass }}"readonly>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col">
<div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">TIPE USERNAME </label>
                <input name="tipe_user" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tipe_user }}"readonly>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">LOGO</label><br>
                <img src="/image/{{ $setting->logo}}" style="width: 120px;float: left;margin-bottom: 5px;">
              </div><br><br><br><br><br><br>
        </div>
    </div>

        <span style="float: right">
            <a class="btn btn-primary" href="/pengaturan_edit/{{ $setting->id_setting }}" role="button"><i class="fas fa-fw fa-edit"></i> Ubah Pengaturan</a>
            @endif
        </div>
  </div>
  @endsection
