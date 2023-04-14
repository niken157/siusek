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
            <label for="exampleFormControlInput1" class="form-label">NAMA SESI</label>
            <div class="input-group">
            <input name="nama_sesi" type="text" class="form-control @error('nama_sesi') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nama Sesi"required>

            @error('nama_sesi')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>
            <i class="form-label">Contoh : SESI-1</i>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JAM AWAL</label>
            <input name="jam_awal" type="time" class="form-control @error('jam_awal') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Jam Sesi"required>
            @error('jam_awal')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JAM BERAKHIR</label>
            <input name="jam_berakhir" type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Jam Sesi"required>
            @error('jam_berakhir')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">KETERANGAN</label>
            <div class="input-group">
            <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Keterangan/hari"required>
            @error('keterangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <i class="form-label">*keterangan meliputi hari sesi dilakukan. Contoh: SENIN-KAMIS</i>
    </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>
    </div>
  </div>
  @endsection
