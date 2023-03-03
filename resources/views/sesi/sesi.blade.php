@extends('template')

@section('content')
<br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DATA SESI UJIAN
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
                            <td>
                                <a class="btn btn-outline-primary" href="/sesi/edit/{{ $p->id_sesi }}" role="button"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/sesi/hapus/{{ $p->id_sesi }}" role="button"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
