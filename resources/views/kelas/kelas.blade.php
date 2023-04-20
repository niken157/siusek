@extends('template')

@section('content')
<br>
    <div class="card mb-4">
        <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA KELAS PESERTA
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/kelas/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA KELAS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($kelas as $k)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $k->nama_kelas}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/kelas/edit/{{ $k->id_kelas }}" role="button"title="Edit Data Kelas"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/kelas/hapus/{{ $k->id_kelas }}" role="button"title="Hapus Data Kelas"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
@endsection
