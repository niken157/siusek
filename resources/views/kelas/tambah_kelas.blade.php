@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA KELAS</h3>
      </div>
    <div class="card-body">
    <form action="/kelas/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA KELAS</label>
            <div class="input-group">
            <input name="nama_kelas" type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nama Kelas"required>

            @error('nama_kelas')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>
            <i class="form-label">Contoh : 10-TKJ-1</i>
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>
    </div>
  </div>
  @endsection
