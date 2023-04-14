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
    <form action="/pengaturan/store" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Ujian </label>
            <input name="nama_ujian" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama ujian" required>
            <i class="form-label">Contoh : ujian tengah semester genap</i>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran </label>
            <input name="tahun_ajaran" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" placeholder="contoh:20--/20--" required>
        </div>
    </div>
  </div>
          <div class="row">
            <div class="col">
                <div class="mb-3">
            <label for="keterangan">Tipe Password</label>
            <select name="tipe_pass" required="reqired" class="form-select" id="tipe_pass">
            <option value="Kombinasi">Kombinasi</option>
            <option value="Angka">Angka</option>
            <option value="Huruf">Huruf</option>
            </select>
        </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Password dan Username </label>
                    <input name="jumlah_pass" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" required>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
          <div class="mb-3">
            <label for="formFile" class="form-label">Logo</label><br>
            <input name="logo" required="reqired" class="form-control" type="file" id="formFile">
          </div>
    </div>
    <div class="col">
         <div class="mb-3">
        <label for="keterangan">Tipe username</label>
        <select name="tipe_user" required="reqired" class="form-select" id="tipe_user">
        <option value="nis">nis</option>
        <option value="random">random</option>
        </select>
    </div>
        </div>
    </div>

        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input class="btn btn-primary" type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection
