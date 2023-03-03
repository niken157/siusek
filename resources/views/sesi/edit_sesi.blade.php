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
            <label for="exampleFormControlInput1" class="form-label">no sesi </label>
            <input name="no_sesi" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $sesi->no_sesi }}"required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">jam sesi</label>
            <input name="jam_sesi" required="reqired" type="time" class="form-control" id="exampleFormControlInput1" value="{{ $sesi->jam_sesi }}"required>
        </div>
        <input type="hidden" name="created_at" value="{{ $sesi->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection


