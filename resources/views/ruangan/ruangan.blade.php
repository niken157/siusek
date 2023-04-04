
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
            <a class="align-items-center justify-content-between btn btn-warning" target="_blank" href="/cetak_ruangan/panitia" role="button"><i class="fas fa-fw fa-print"></i> Panitia</a>
            <a class="align-items-center justify-content-between btn btn-success" target="_blank" href="/cetak_ruangan/pengawas" role="button"><i class="fas fa-fw fa-print"></i> Pengawas</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA RUANGAN</th>
                        <th>RUANGAN</th>
                        <th>JUMLAH PC</th>
                        <th>CADANGAN</th>
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
                            <td>{{ $p->jumlah_PC}}</td>
                            <td>{{ $p->cadangan_pc}}</td>
                            <td>{{ $p->keterangan}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/ruangan/edit/{{ $p->id_ruangan }}" role="button"title="Edit Data Ruangan"><i class="fas fa-fw fa-edit"></i></a>
                                <a class="btn btn-outline-warning" target="_blank" href="/cetakruangan/{{ $p->id_ruangan }}" role="button"title="Cetak Ruangan"><i class="fas fa-fw fa-print"></i></a>
                                <a class="btn btn-outline-success" target="_blank" href="/cetak_amplop/{{ $p->id_ruangan }}" role="button" title="Cetak Amplop Ruangan"><i class="fas fa-fw fa-envelope"></i></a>
                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/ruangan/hapus/{{ $p->id_ruangan }}" role="button" title="Hapus Data Ruangan"><i class="fas fa-fw fa-trash"></i></a>
                            </td></td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
