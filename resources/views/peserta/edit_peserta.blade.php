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
                    <label for="kelas">KELAS PESERTA</label><br>
                    <select class="selectpicker" data-live-search="true" name="kelas" class="form-select" id="kelas" visibleOptions="true">
                        @php
                        $kelas = DB::table('kelas')->get();
                        @endphp
                    @foreach($kelas as $p)
                    <option value="{{ $peserta->kelas }}">{{ $peserta->kelas }}</option>
                        <option value="{{ $p->nama_kelas }}">{{ $p->nama_kelas }}</option>
                    @endforeach
                    </select>
                </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="keterangan">JENIS KELAMIN:</label>
            <select name="jenis_kelamin" required="reqired" class="form-select" id="jenis_kelamin">
            <option value="{{ $peserta->jenis_kelamin }}">{{ $peserta->jenis_kelamin }}</option>
            <option value="Perempuan" @if ($peserta->jenis_kelamin=="Perempuan") selected @endif>Perempuan</option>
            <option value="Laki-Laki" @if ($peserta->jenis_kelamin=="Laki-Laki") selected @endif>Laki-Laki</option>
            </select>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col">
<div class="mb-3">
            <label for="keterangan">AGAMA:</label>
            <select name="agama" required="reqired" class="form-select" id="agama">
            <option value="Islam" @if ($peserta->agama=="Islam") selected @endif>Islam</option>
            <option value="Kristen" @if ($peserta->agama=="Kristen") selected @endif>Kristen</option>
            <option value="Katolik" @if ($peserta->agama=="Katolik") selected @endif>Katolik</option>
            <option value="Hindu" @if ($peserta->agama=="Hindu") selected @endif>Hindu</option>
            <option value="Budha" @if ($peserta->agama=="Budha") selected @endif>Budha</option>
            <option value="Konghucu" @if ($peserta->agama=="Konghucu") selected @endif>Konghucu</option>
            </select>
        </div>
    </div>
    <div class="col">

    </div>
</div>
        <input type="hidden" name="created_at" value="{{ $peserta->created_at }}">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="submit" value="Simpan Data" class="btn btn-primary">
    </form>
    </div>
</div>
@endsection
