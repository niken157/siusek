@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-body">
      <h1>Edit Pengaturan</h1>
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/pengaturan/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_setting" value="{{ $setting->id_setting}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Ujian </label>
            <input name="nama_ujian" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->nama_ujian }}"required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Logo</label><br>
            <img src="/image/{{ $setting->logo}}" style="width: 120px;float: left;margin-bottom: 5px;">
            <input name="logo" required="reqired" class="form-control" type="file" id="formFile" value="{{ $setting->logo }}">
          </div>
          <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="keterangan">Semester</label>
                    <select name="semester" required="reqired" class="form-control" id="semester">
                    <option value="{{ $setting->semester }}">{{ $setting->semester}}</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran </label>
                    <input name="tahun_ajaran" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $setting->tahun_ajaran }}"required>
                </div>
            </div>
          </div>
        <input type="hidden" name="created_at" value="{{ $setting->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection
