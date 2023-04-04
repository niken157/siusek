
@extends('template')

@section('content')
<style>
    td {
        font-size: 14px;
    }
    .upper { text-transform: uppercase; }
</style>
<br>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA PESERTA UJIAN
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/peserta/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
            <a class="btn btn-secondary" href="{{ route('peserta.export') }}"><i class="fas fa-fw fa-download"></i>Export Data Peserta</a>
            <a class="align-items-center justify-content-between btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Semua Data?')" href="/peserta/hapus_semua" role="button"><i class="fas fa-fw fa-trash"></i> Semua</a>
        </div>
        <div class="card-body table-responsive">
            <form action="{{ route('peserta.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary"><i class="fas fa-fw fa-file"></i>Import Data User</button>
            </form>
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th class="col-xs-1">NAMA PESERTA</th>
                        <th>NIS</th>
                        <th>KELAS</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th class="col-xs-1">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($peserta as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><p class="upper">{{ $p->nama_peserta }}</p></td>
                            <td>{{ $p->nis }}</td>
                            <td>{{ $p->kelas }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/peserta/edit/{{ $p->id_peserta }}" role="button" title="Edit Data Peserta"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/peserta/hapus/{{ $p->id_peserta }}" role="button" title="Hapus Data Peserta"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
