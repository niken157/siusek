
@extends('template')

@section('content')
<br>
    <div>
    <div class="card mb-4">
        <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA RUANGAN UJIAN
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/ruangan/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Ruangan</th>
                        <th>Nama Ruangan</th>
                        <th>Jumlah PC</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ruangan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nomer_ruangan}}</td>
                            <td>{{ $p->nama_ruangan}}</td>
                            <td>{{ $p->jumlah_PC}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/ruangan/edit/{{ $p->id_ruangan }}" role="button"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/ruangan/hapus/{{ $p->id_ruangan }}" role="button"><i class="fas fa-fw fa-trash"></i></a>
                            </td></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
