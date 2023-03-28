
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
                        <th>NO</th>
                        <th width="50%">NAMA RUANGAN</th>
                        <th>KETERANGAN</th>
                        <th>NAMA SESI</th>
                        <th>JUMLAH PESERTA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ujian as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama_ruangan}}</td>
                            <td>{{ $p->keterangan_ruangan}}</td>
                            <td>{{ $p->nama_sesi}}</td>
                            @php
                                $u = DB::table('peserta')
                                ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                                ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                                ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                                ->where([
                                    ['ruangan.nama_ruangan', '=', $p->nama_ruangan],
                                    ['sesi.nama_sesi', '=', $p->nama_sesi] ])
                                ->orderBy('nomor_pc', 'asc')
                                ->get();
                            @endphp
                            <td>{{ $u->count()}}</td>
                            <td>
                                <a class="btn btn-outline-primary" title="cetak absen persesi" href="/cetak/{{ $p->nama_ruangan }}/{{ $p->nama_sesi }}" target="_blank" role="button"><i class="fas fa-fw fa-print"> </i> Absensi</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

