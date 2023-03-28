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
    <form action="/kartu_peserta/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_ujian" value="{{ $ujian->id_ujian }}">
        <div class="mb-3">
            <label for="id_peserta">NAMA PESERTA :</label>
            <select class="selectpicker" data-live-search="true" name="id_peserta" class="form-select" id="id_peserta">
                @php
                    $peserta = DB::table('peserta')
                ->join('upas', 'peserta.id_peserta', '=', 'upas.id_peserta')
                ->get();
                @endphp
                <option value="{{ $ujian->id_peserta }}">{{ $ujian->nama_peserta }}</option>
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
            <label for="id_ruangan">NAMA RUANGAN :</label>
            <select name="id_ruangan" class="form-select" id="id_ruangan">
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
            <label for="id_sesi">NAMA SESI :</label>
            <select name="id_sesi" class="form-select" id="id_sesi">
                @php
                    $ruangan = DB::table('sesi')->get();
                @endphp
                <option value="{{ $ujian->id_sesi }}">sesi-{{ $ujian->nama_sesi }} Hari {{ $ujian->keterangan }}</option>
            @foreach($ruangan as $p)
            <option value="{{ $p->id_sesi }}">{{ $p->nama_sesi }} Hari {{ $p->keterangan }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NOMER PC</label>
            <input name="nomor_pc" value="{{ $ujian->nomor_pc}}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan ID Sesi"required>
        </div>
        <input type="hidden" name="created_at" value="{{ $ujian->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data" class="btn btn-primary">
    </form>

    </div>
  </div>
  @endsection


