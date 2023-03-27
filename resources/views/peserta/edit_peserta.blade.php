@extends('template')

@section('content')
<br>
<div class="card">
    <div class="card-header">
        <h3>FORM EDIT DATA PESERTA</h3>
      </div>
    <div class="card-body">
      <?php
        $date= date('d F Y, h:i:s A');
        ?>
    <form action="/peserta/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_peserta" value="{{ $peserta->id_peserta }}">
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIS PESERTA</label>
            <input name="nis" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $peserta->nis }}" required>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NAMA PESERTA</label>
            <input name="nama_peserta" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama peserta " value="{{ $peserta->nama_peserta }}" required>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">KELAS PESERTA</label>
            <input name="kelas" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $peserta->kelas }}" required>
            <i class="form-label">Contoh : 12-RPL-1</i>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="keterangan">JURUSAN:</label>
            <select name="jurusan" required="reqired" class="form-select" id="jurusan">
            <option value="{{ $peserta->jurusan }}">{{ $peserta->jurusan}}</option>
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
            <option value="{{ $peserta->jenis_kelamin }}">{{ $peserta->jenis_kelamin }}</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Laki-Laki">Laki-Laki</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="keterangan">AGAMA:</label>
            <select name="agama" required="reqired" class="form-select" id="agama">
            <option value="{{ $peserta->agama}}">{{ $peserta->agama}}</option>
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
        <input type="hidden" name="created_at" value="{{ $peserta->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
