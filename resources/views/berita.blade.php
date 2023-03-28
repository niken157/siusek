
@extends('template')

@section('content')
<br>
    <div>
    <div class="card mb-4">
        <div class="card-header">
            <h4>CETAK BERITA ACARA</h4>
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
                                <a class="btn btn-outline-primary" title="Cetak Berita Acara " href="/cetakberita/{{ $p->nama_ruangan }}/{{ $p->nama_sesi }}" role="button" target="_blank"><i class="fas fa-fw fa-print"> </i>Manual</a>
                                @php
                                    $ba = DB::table('tabel_berita_acara')
                                    ->where([
                                        ['nama_ruangan', '=', $p->nama_ruangan],
                                        ['nama_sesi', '=', $p->nama_sesi] ])
                                    ->count();
                                @endphp
                                @if ($ba == 0)
                                <a class="btn btn-outline-success" title="Berita Acara Digital" href="/berita_acara/{{ $p->nama_ruangan }}/{{ $p->nama_sesi }}" role="button"><i class="fas fa-fw fa-print"> </i>Digital</a>

                                @else
                                <a class="btn btn-outline-warning" title="Cetak Berita Acara Digital " href="/cetak_berita/{{ $p->nama_ruangan }}/{{ $p->nama_sesi }}" role="button" target="_blank"><i class="fas fa-fw fa-print"> </i>Cetak</a>
                                <a class="btn btn-outline-success" title="Edit Riwayat Berita Acara " href="/edit_berita_acara/{{ $p->nama_ruangan }}/{{ $p->nama_sesi }}" role="button"><i class="fas fa-fw fa-edit"> </i>Digital</a>
                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Berita Acara Digital Ini?')" title="Hapus Riwayat Berita Acara " href="/berita/hapus_digital/{{ $p->nama_ruangan }}/{{ $p->nama_sesi }}" role="button"><i class="fas fa-fw fa-trash"> </i>Hapus</a>
                                @endif


                            </td>

                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

