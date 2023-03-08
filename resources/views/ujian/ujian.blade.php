
@extends('template')

@section('content')
<br>
    <div class="card mb-4">
    <div class="card-header">
        <span style=" font-size: 1cm;">
            DATA KARTU UJIAN
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-warning" onclick="Semua()" role="button"><i class="fa-solid fa-print" title="cetak kartu semua peserta"></i> Cetak Kartu</a>
            <a class="align-items-center justify-content-between btn btn-primary" href="/pembagian/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
            <a class="align-items-center justify-content-between btn btn-primary" href="/pembagian/generate" role="button"><i class="fas fa-fw fa-plus"></i> Generate</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Ruangan</th>
                        <th>Sesi</th>
                        <th>No PC</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ujian as $u)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $u->nama_peserta}}</td>
                            <td>{{ $u->nama_ruangan}}</td>
                            <td>{{ $u->no_sesi}}</td>
                            <td>{{ $u->nomor_pc}}</td>
                            <td>
                            <a class="btn btn-outline-warning" onclick="Satuan()"  href="/kartu_satuan/{{ $u->id_ujian }}" role="button" title="Cetak Kartu Peserta"><i class="fa-solid fa-print"></i></a>
                                <a class="btn btn-outline-primary" href="/pembagian/edit/{{ $u->id_ujian }}" role="button" title="Edit Data Kartu"><i class="fas fa-fw fa-edit"></i></a>
                                <script>
                                    function Satuan() {
                                        window.open(
                                        "/kartu_satuan/{{ $u->id_ujian }}", "_blank");
                                    }
                                    function Semua() {
                                        window.open(
                                        "/kartu", "_blank");
                                    }
                                </script>
                                <a class="btn btn-outline-danger" href="/pembagian/hapus/{{ $u->id_ujian }}" role="button" title="Hapus Data Kartu"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
