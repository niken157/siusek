@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM UBAH DATA RUANGAN</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/ruangan/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_ruangan" value="{{ $ruangan->id_ruangan}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA RUANGAN</label>
            <div class="input-group">
            <input name="nama_ruangan" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->nama_ruangan }}"required>
            {{-- @error('nama_ruangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <i class="form-label">Contoh : R.1</i>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">KETERANGAN</label>
            <input name="keterangan_ruangan" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->keterangan_ruangan }}"required>
            {{-- @error('keterangan_ruangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JUMLAH PC</label>
            <input name="jumlah_PC" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->jumlah_PC }}"required>
            {{-- @error('jumlah_PC')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">CADANGAN PC</label>
            <input name="cadangan_pc" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->cadangan_pc }}"required>
            {{-- @error('cadangan_pc')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="keterangan">KETERANGAN:</label>
            <div class="input-group">
            <select name="keterangan" required="reqired" class="form-select" id="keterangan">
            <option value="ya" @if ($ruangan->keterangan=="ya") selected @endif>Ruangan Di Pakai</option>
            <option value="tidak" @if ($ruangan->keterangan=="tidak") selected @endif>Ruangan Tidak Di Pakai</option>
            </select>
        </div>
        <i class="form-label">*jika ruangan tidak dipakai pilih "ruangan tidak dipakai". jika memilih "ruangan tidak dipakai" maka pc diruangan ini tidak akan tersedia</i>
    </div>
        <input type="hidden" name="created_at" value="{{ $ruangan->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>

    </div>
  </div>
  @endsection


