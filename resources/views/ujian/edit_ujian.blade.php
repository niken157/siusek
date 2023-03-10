@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>EDIT KARTU UJIAN</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/pembagian/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_ujian" value="{{ $ujian->id_ujian }}">
        <div class="mb-3">
            <label for="id_peserta">Nama Peserta :</label>
            <select class="selectpicker" data-live-search="true" name="id_peserta" class="form-control" id="id_peserta">
                @php
                    $peserta = DB::table('peserta')->get();
                @endphp
                <option value="{{ $ujian->id_peserta }}">{{ $ujian->nama_peserta }}</option>
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
                <option value="{{ $ujian->id_ruangan }}">{{ $ujian->nama_ruangan }}</option>
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
                <option value="{{ $ujian->id_sesi }}">{{ $ujian->no_sesi }}</option>
            @foreach($ruangan as $p)
            <option value="{{ $p->id_sesi }}">{{ $p->no_sesi }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No PC</label>
            <input name="nomor_pc" value="{{ $ujian->nomor_pc}}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan ID Sesi"required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="pass" value="{{ $ujian->pass}}" type="number" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <input type="hidden" name="created_at" value="{{ $ujian->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>

    </div>
  </div>
  @endsection


