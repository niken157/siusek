
@extends('template')

@section('content')
<br>
    <div>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            CETAK RUANGAN UJIAN
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ruangan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>R-{{ $p->nomer_ruangan}}</td>
                            <td>{{ $p->nama_ruangan}}</td>
                            <td>
                                <a class="btn btn-outline-primary" target="_blank" href="/cetakruangan/{{ $p->id_ruangan }}" role="button"title="Cetak Ruangan"><i class="fas fa-fw fa-print"></i></a>

                                <a class="btn btn-outline-success" target="_blank" href="/cetak_amplop/{{ $p->id_ruangan }}" role="button" title="Cetak Amplop Ruangan"><i class="fas fa-fw fa-envelope"></i></a>
                            </td></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
