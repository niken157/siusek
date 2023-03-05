@extends('template')

@section('content')
<br>
    <div class="card mb-4">
        <div class="card-header">
            <h4>DATA SESI UJIAN</h4>
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/sesi/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Sesi</th>
                        <th>Jam Sesi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($sesi as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->no_sesi}}</td>
                            <td>{{ $p->jam_sesi}}</td>
                            <td>{{ $p->keterangan}}</td>
                            <td>
                                <a class="btn btn-outline-primary" title="edit data sesi" href="/sesi/edit/{{ $p->id_sesi }}" role="button"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" title="hapus data sesi" href="/sesi/hapus/{{ $p->id_sesi }}" role="button"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
