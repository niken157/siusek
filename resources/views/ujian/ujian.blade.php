
@extends('template')

@section('content')
<br>
    <div class="card mb-4">
        <div class="card-header">
            <span style=" font-size: 1cm;">
            DATA KARTU UJIAN
            <span style="float: right">
                <a class="align-items-center justify-content-between btn btn-warning" href="/kartu" role="button"><i class="fa-solid fa-print"></i> Cetak Kartu</a>

            {{-- <a class="align-items-center justify-content-between btn btn-primary" href="/ujian/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a> --}}

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
                            <a class="btn btn-outline-warning" href="/kartu_satuan/{{ $u->id_ujian }}" role="button"><i class="fa-solid fa-print"></i></a>
                                <a class="btn btn-outline-primary" href="/ujian/edit/{{ $u->id_ujian }}" role="button"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/ujian/hapus/{{ $u->id_ujian }}" role="button"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
