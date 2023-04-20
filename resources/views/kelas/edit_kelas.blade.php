@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM UBAH DATA KELAS</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/kelas/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_kelas" value="{{ $kelas->id_kelas}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA KELAS </label>
            <div class="input-group">
            <input name="nama_kelas" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $kelas->nama_kelas }}"required>
        </div>
        <i class="form-label">Contoh : 10-TKJ-1</i>
        </div>
        <input type="hidden" name="created_at" value="{{ $kelas->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>

    </div>
  </div>
  @endsection


