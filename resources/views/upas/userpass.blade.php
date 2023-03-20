
@extends('template')

@section('content')
<br>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            PENGELOLAAN USERNAME DAN PASSWORD
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/userpass/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
            <a class="align-items-center justify-content-between btn btn-secondary" href="/userpass/generate" role="button"><i class="fas fa-fw fa-gear"></i> Generate</a>
            <a class="align-items-center justify-content-between btn btn-danger" href="/userpass/hapus_semua" role="button"><i class="fas fa-fw fa-trash"></i> Semua</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th class="col-xs-1">NAMA PESERTA</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th class="col-xs-1">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($upas as $p)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td>{{ $p->nama_peserta }}</td>
                            @if ($p->username == 'nis')
                            <td>{{ $p->nis }}</td>
                            @else
                            <td>{{ $p->username }}</td>
                            @endif
                            <td>{{ $p->pass }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/userpass/edit/{{ $p->id_kartu }}" role="button" title="Edit Data UserPass"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/userpass/hapus/{{ $p->id_kartu }}" role="button" title="Hapus Data UserPass"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
