@extends('template')

@section('content')
<div class="card">
    <div class="card-body">
      <h1>Edit Pengaturan</h1>
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/setting/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_setting" value="{{ $setting->id_setting}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Setting</label>
            <input name="id_setting" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->id_setting }}" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Aplikasi </label>
            <input name="nama_aplikasi" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->nama_aplikasi }}"readonly>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Logo</label><br>
            <img src="/user/img/buku/{{ $setting->logo }}" style="width: 120px;float: left;margin-bottom: 5px;">
            <input name="logo" required="reqired" class="form-control" type="file" id="formFile" value="{{ $setting->logo }}">
          </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Semester</label>
            <input name="semester" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->semester }}"readonly>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran </label>
            <input name="tahun_ajaran" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tahun_ajaran }}"readonly>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tahun Ini</label>
            <input name="tahun_ini" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tahun_ini }}"required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bulan </label>
            <input name="bulan" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->bulan }}"required>
        </div>
        <input type="hidden" name="created_at" value="{{ $setting->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection
