
@extends('template')

@section('content')
    <h1 class="mt-4">Data Peserta ujian</h1><br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Peserta Ujian
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/peserta/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Nis</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
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
                            <td>{{ $p->jurusan }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>
                                <a class="btn btn-primary" href="/peserta/edit/{{ $p->id_peserta }}" role="button"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-danger" href="/peserta/hapus/{{ $p->id_peserta }}" role="button"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
