@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM TAMBAH DATA PESERTA</h3>
      </div>
    <div class="card-body">
    <form action="/peserta/store" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIS PESERTA</label>
            <input name="nis" type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan nis" autofocus value="{{ old('nis') }}" required>
            @error('nis')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA PESERTA</label>
            <input name="nama_peserta" type="text" class="form-control @error('nama_peserta') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan nama peserta " value="{{ old('nama_peserta') }}" required>
            @error('nama_peserta')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">KELAS PESERTA</label>
            <input name="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan kelas" autofocus value="{{ old('kelas') }}" required>
            <i class="form-label">Contoh : 12-RPL-1</i>
            @error('kelas')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="keterangan">JURUSAN:</label>
            <select name="jurusan" required="reqired" class="form-select" id="jurusan">
            <option value="RPL">RPL</option>
            <option value="TKJ">TKJ</option>
            <option value="TIPTL">TIPTL</option>
            <option value="TKRO">TKRO</option>
            <option value="TPM">TPM</option>
            <option value="DKV">DKV</option>
            <option value="TAB">TAB</option>
            <option value="TKKR">TKKR</option>
            </select>
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="keterangan">JENIS KELAMIN:</label>
            <select name="jenis_kelamin" required="reqired" class="form-select" id="jenis_kelamin">
            <option value="Perempuan">Perempuan</option>
            <option value="Laki-Laki">Laki-Laki</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="keterangan">AGAMA:</label>
            <select name="agama" required="reqired" class="form-select" id="agama">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        </div>
        </div>
        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="SIMPAN DATA" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
