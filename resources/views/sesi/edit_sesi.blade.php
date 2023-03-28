@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM UBAH DATA SESI</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/sesi/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_sesi" value="{{ $sesi->id_sesi}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA SESI </label>
            <div class="input-group">
            <input name="nama_sesi" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $sesi->nama_sesi }}"required>
            <i class="form-label">Contoh : SESI-1</i>
        </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JAM SESI</label>
            <input name="jam_sesi" required="reqired" type="time" class="form-control" id="exampleFormControlInput1" value="{{ $sesi->jam_sesi }}"required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">KETERANGAN</label>
            <input name="keterangan" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $sesi->keterangan }}"required>
        </div>
        <input type="hidden" name="created_at" value="{{ $sesi->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>

    </div>
  </div>
  @endsection


