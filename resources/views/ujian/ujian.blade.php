
@extends('template')

@section('content')
<br>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DATA KARTU UJIAN
            <span style="float: right">
                <a class="align-items-center justify-content-between btn btn-warning" onclick="Semua()" role="button"><i class="fa-solid fa-print" title="cetak kartu semua peserta"></i> Cetak Kartu</a>

            <a class="align-items-center justify-content-between btn btn-primary" href="/ujian/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>

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
                            <a class="btn btn-outline-warning" onclick="Satuan()"  href="/kartu_satuan/{{ $u->id_ujian }}" role="button" title="cetak kartu peserta"><i class="fa-solid fa-print"></i></a>
                                <a class="btn btn-outline-primary" href="/ujian/edit/{{ $u->id_ujian }}" role="button" title="edit data kartu"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/ujian/hapus/{{ $u->id_ujian }}" role="button" title="hapus data kartu"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
