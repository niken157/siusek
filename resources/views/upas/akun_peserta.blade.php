
@extends('template')

@section('content')
@include('sweetalert::alert')

<style>
    .upper { text-transform: uppercase; }
</style>
<br>
    <div class="card mb-4">
    <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA AKUN PESERTA
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-secondary" onclick="return confirm('Apakah Anda Yakin Mengenerate Semua Data?')" href="/akun_peserta/generate" role="button"><i class="fas fa-fw fa-gear"></i> Generate</a>
            <a class="align-items-center justify-content-between btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Semua Data?')" href="/akun_peserta/hapus_semua" role="button"><i class="fas fa-fw fa-trash"></i> Semua</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th class="col-xs-1">NAMA PESERTA</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th class="col-xs-1">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($upas as $p)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td><p class="upper">{{ $p->nama_peserta }}</p></td>
                            @if ($p->username == 'nis')
                            <td>{{ $p->nis }}</td>
                            @else
                            <td>{{ $p->username }}</td>
                            @endif
                            <td>{{ $p->pass }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/akun_peserta/edit/{{ $p->id_kartu }}" role="button" title="Edit Data akun_peserta"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/akun_peserta/hapus/{{ $p->id_kartu }}" role="button" title="Hapus Data akun_peserta"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
