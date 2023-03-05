
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
                        <th>Nomer Ruangan</th>
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
                            <td>{{ $peserta->count('id_peserta')}}</td>
                            <td>
                                <a class="btn btn-outline-primary" title="cetak absen persesi" onclick="NewTab()" role="button"><i class="fas fa-fw fa-print"> </i></a>
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

