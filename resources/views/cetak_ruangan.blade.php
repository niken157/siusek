
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
            <a class="align-items-center justify-content-between btn btn-primary" target="_blank" href="/cetak_ruangan/panitia" role="button"><i class="fas fa-fw fa-print"></i> Panitia</a>
            <a class="align-items-center justify-content-between btn btn-success" target="_blank" href="/cetak_ruangan/pengawas" role="button"><i class="fas fa-fw fa-print"></i> Pengawas</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA RUANGAN</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ruangan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama_ruangan}}</td>
                            <td>{{ $p->keterangan_ruangan}}</td>
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
