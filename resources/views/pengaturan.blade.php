@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
      <h3>PENGATURAN WEB</h3>
    </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
        @foreach($setting as $s)
    <form action="/setting/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_setting" value="{{ $s->id_setting}}">
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Ujian </label>
            <input name="nama_ujian" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $s->nama_ujian }}"readonly>
        </div>
    </div>
    <div class="col">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran </label>
          <input name="tahun_ajaran" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $s->tahun_ajaran }}"readonly>
      </div>
    </div>
  </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Logo</label><br>
            <img src="/image/{{ $s->logo}}" style="width: 120px;float: left;margin-bottom: 5px;">
          </div><br><br><br><br><br><br>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Semester</label>
                    <input name="semester" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $s->semester }}"readonly>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Password </label>
                    <input name="jumlah_pass" required="reqired" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $s->jumlah_pass }}"readonly>
                </div>
              </div>
            </div>
        <span style="float: right">
            <a class="btn btn-primary" href="/pengaturan_edit/{{ $s->id_setting }}" role="button"><i class="fas fa-fw fa-edit"></i> Ubah Pengaturan</a>

    </form>
@endforeach
    </div>
  </div>
  @endsection
