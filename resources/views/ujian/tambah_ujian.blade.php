
@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA UJIAN</h3>
      </div>
    <div class="card-body">
    <form action="/kartu_peserta/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="id_peserta">Nama Peserta Didik :</label>
            <select class="selectpicker" data-live-search="true" name="id_peserta" class="form-select" id="id_peserta" visibleOptions="true">
                @php
                $peserta = DB::table('peserta')
                ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
                ->get();
                @endphp
            @foreach($peserta as $p)
            @php
                    $peserta = DB::table('peserta')->get();
                    $u = DB::table('peserta')
                      ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->where('ujian.id_peserta', $p->id_peserta)
                    ->count();
                @endphp
            @if ($u == 0)
                <option value="{{ $p->id_peserta }}">{{ $p->nama_peserta }}</option>
            @endif

            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_ruangan">Nama Ruangan :</label>
            <select name="id_ruangan" class="form-select" id="id_ruangan">
                @php
                    $ruangan = DB::table('ruangan')->get();
                @endphp
            @foreach($ruangan as $p)
            <option value="{{ $p->id_ruangan }}">{{ $p->nama_ruangan }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_sesi">Nama Sesi :</label>
            <select name="id_sesi" class="form-select" id="id_sesi">
                @php
                    $ruangan = DB::table('sesi')->get();
                @endphp
            @foreach($ruangan as $p)
            <option value="{{ $p->id_sesi }}">sesi-{{ $p->no_sesi }} Hari {{ $p->keterangan }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No PC</label>
            <input name="nomor_pc" type="number" class="form-control" id="exampleFormControlInput1" placeholder=""required>
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data">
    </form>
    </div>
  </div>
  @endsection
