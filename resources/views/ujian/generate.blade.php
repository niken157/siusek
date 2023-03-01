
@extends('template')

@section('content')
<div class="card">
    <div class="card-body">
      <h1> Tambah Data Ujian</h1>
    <form action="/ujian/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <label for="id_peserta">ID Peserta Didik :</label>
            <select name="id_peserta" class="form-control" id="id_peserta">
                @php
                    $peserta = DB::table('peserta')->get();
                @endphp
            @foreach($peserta as $p)
            <option value="{{ $p->id_peserta }}">{{ $p->nama_peserta }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_ruangan">ID Ruangan :</label>
            <select name="id_ruangan" class="form-control" id="id_ruangan">
                @php
                    $ruangan = DB::table('ruangan')->get();
                @endphp
            @foreach($ruangan as $p)
            <option value="{{ $p->id_ruangan }}">{{ $p->nama_ruangan }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_sesi">ID Sesi :</label>
            <select name="id_sesi" class="form-control" id="id_sesi">
                @php
                    $ruangan = DB::table('sesi')->get();
                @endphp
            @foreach($ruangan as $p)
            <option value="{{ $p->id_sesi }}">{{ $p->no_sesi }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No PC</label>
            <input name="nomor_pc" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan ID Sesi"required>
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>
    </div>
  </div>
  @endsection
