@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA SESI</h3>
      </div>
    <div class="card-body">
    <form action="/sesi/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No Sesi</label>
            <input name="no_sesi" type="number" class="form-control @error('no_sesi') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan no sesi"required>
            @error('no_sesi')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jam Sesi</label>
            <input name="jam_sesi" type="time" class="form-control @error('jam_sesi') is-invalid @enderror" id="exampleFormControlInput1" required>
            @error('jam_sesi')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Keterangan Hari</label>
            <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan keterangan hari"required>
            @error('keterangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>
    </div>
  </div>
  @endsection
