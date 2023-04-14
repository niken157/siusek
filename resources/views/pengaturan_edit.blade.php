@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
      <h3>PENGATURAN UJIAN</h3>
    </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/pengaturan/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_setting" value="{{ $setting->id_setting}}">
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA UJIAN </label>
            <input name="nama_ujian" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->nama_ujian }}"required>
            <i class="form-label">Contoh : ujian tengah semester genap</i>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">TAHUN AJARAN</label>
            <input name="tahun_ajaran" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tahun_ajaran }}"required>
        </div>
    </div>
  </div>
          <div class="row">
            <div class="col">
<div class="mb-3">
            <label for="keterangan">TIPE PASSWORD</label>
            <select name="tipe_pass" required="reqired" class="form-select" id="tipe_pass">

            <option value="Kombinasi" @if ($setting->tipe_pass=="Kombinasi") selected @endif >KOMBINASI</option>
            <option value="Angka"  @if ($setting->tipe_pass=="Angka") selected @endif >ANGKA</option>
            <option value="Huruf"  @if ($setting->tipe_pass=="Huruf") selected @endif >HURUF</option>
            </select>
        </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">JUMLAH PASSWORD </label>
                    <input name="jumlah_pass" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $setting->jumlah_pass }}"required>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
          <div class="mb-3">
        <label for="keterangan">TIPE USERNAME</label>
        <select name="tipe_user" required="reqired" class="form-select" id="tipe_user">
        <option value="nis" @if ($setting->tipe_user=="nis") selected @endif>NIS</option>
        <option value="random" @if ($setting->tipe_user=="random") selected @endif>RANDOM</option>
        </select>
    </div>
    </div>
    <div class="col">
        <div class="mb-3">
        <label for="formFile" class="form-label">LOGO</label><br>
        <img src="/image/{{ $setting->logo}}" style="width: 120px;float: left;margin-bottom: 5px;">
        <input name="logo" class="form-control" type="file" id="formFile" value="{{ $setting->logo }}">
      </div>
    </div>
    </div>


        <input type="hidden" name="created_at" value="{{ $setting->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input class="btn btn-primary" type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection
