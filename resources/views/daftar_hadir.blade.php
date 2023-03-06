
@extends('template')

@section('content')
<br>
    <div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>CETAK DAFTAR HADIR</h4>
            <span style="float: right">
            </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="50%">Nomer Ruangan</th>
                        <th>Ruangan</th>
                        <th>Sesi</th>
                        <th>Jumlah Peserta</th>
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
                            @php
                                $u = DB::table('peserta')
                                ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                                ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                                ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                                ->where([
                                    ['ruangan.nomer_ruangan', '=', $p->nomer_ruangan],
                                    ['sesi.no_sesi', '=', $p->no_sesi] ])
                                ->orderBy('nomor_pc', 'asc')
                                ->get();
                            @endphp
                            <td>{{ $u->count()}}</td>
                            <td>
                                <a class="btn btn-outline-primary" title="cetak absen persesi" href="/cetak/{{ $p->nomer_ruangan }}/{{ $p->no_sesi }}" onclick="NewTab()" role="button"><i class="fas fa-fw fa-print"> </i></a>
                            </td>
                            <script>
                                function NewTab() {
                                    window.open(
                                    "/cetak/{{ $p->nomer_ruangan }}/{{ $p->no_sesi }}", "_blank");
                                }
                            </script>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

