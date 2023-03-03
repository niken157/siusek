
@extends('template')

@section('content')
    <div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           <h3> CETAK DAFTAR HADIR </h3>
            <span style="float: right">
            </div>
        <div class="card-body">
            <table class="table table-striped id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Ruangan</th>
                        <th>Ruangan</th>
                        <th>Sesi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ujian as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nomer_ruangan}}</td>
                            <td>{{ $p->nama_ruangan}}</td>
                            <td>{{ $p->no_sesi}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/cetak/{{ $p->nomer_ruangan }}/{{ $p->no_sesi }}" role="button"><i class="fas fa-fw fa-print"> </i> Absen</a>
                                <a class="btn btn-outline-warning" href="/cetakKartu/{{ $p->nomer_ruangan }}/{{ $p->no_sesi }}" role="button"><i class="fas fa-fw fa-print"> </i>Kartu</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
