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
            <label for="exampleFormControlInput1" class="form-label">Nama Ruangan</label>
            <input name="nomer_ruangan" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->nomer_ruangan }}"required>
            {{-- @error('nomer_ruangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Keterangan </label>
            <input name="nama_ruangan" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->nama_ruangan }}"required>
            {{-- @error('nama_ruangan')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jumlah PC</label>
            <input name="jumlah_PC" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->jumlah_PC }}"required>
            {{-- @error('jumlah_PC')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cadangan PC</label>
            <input name="cadangan_pc" required="reqired" type="number" class="form-control" id="exampleFormControlInput1" value="{{ $ruangan->cadangan_pc }}"required>
            {{-- @error('cadangan_pc')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror --}}
        </div>
        <input type="hidden" name="created_at" value="{{ $ruangan->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection


