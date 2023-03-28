
@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA RUANGAN</h3>
      </div>
    <div class="card-body">
    <form action="/ruangan/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA RUANGAN</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">R-</span>
            <input name="nomer_ruangan" value="{{ old('nomer_ruangan') }}" type="text" class="form-control @error('nomer_ruangan') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nomor Ruangan"required>
            @error('nomer_ruangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">KETERANGAN RUANGAN </label>
            <input name="nama_ruangan" value="{{ old('nama_ruangan') }}" type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Nama Ruangan"required>
            @error('nama_ruangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="keterangan">KETERANGAN:</label>
            <select name="keterangan" required="reqired" class="form-select" id="keterangan">
            <option value="Ruangan Di Pakai">Ruangan Di Pakai</option>
            <option value="Ruangan Tidak Di Pakai">Ruangan Tidak Di Pakai</option>
            </select>
        </div>
    </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JUMLAH PC</label>
            <input name="jumlah_PC" value="{{ old('jumlah_PC') }}" type="number" class="form-control @error('jumlah_PC') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Jumlah PC"required>
            @error('jumlah_PC')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">CADANGAN PC</label>
            <input name="cadangan_pc" value="{{ old('cadangan_pc') }}" type="number" class="form-control @error('cadangan_pc') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan Cadangan PC"required>
            @error('cadangan_pc')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>
    </div>
  </div>
  @endsection
