
@extends('template')

@section('content')
<br>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA PESERTA UJIAN
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/peserta/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple"  style=" font-size: 80%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Nis</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($peserta as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama_peserta }}</td>
                            <td>{{ $p->nis }}</td>
                            <td>{{ $p->kelas }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/peserta/edit/{{ $p->id_peserta }}" role="button" title="Edit Data Peserta"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/peserta/hapus/{{ $p->id_peserta }}" role="button" title="Hapus Data Peserta"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
