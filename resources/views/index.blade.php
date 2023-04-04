
@extends('template')

@section('content')
<style>
    .upper { text-transform: uppercase; }
</style>
    <h1 class="mt-4">SISTEM ADMINISTRASI UJIAN SEKOLAH</h1>
    <br>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol> --}}
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Jumlah Peserta <span style="float: right"><h2><p><b> {{$peserta->count()}}</h2></b></p></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/peserta">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Ruangan <span style="float: right"><h2><b><p>{{$ruangan->count()}}</h2></b></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/ruangan">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Jumlah Sesi <span style="float: right"><h2><b><p>{{$sesi->count()}}</b></h2></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/sesi">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Jumlah PC <span style="float: right"><h2><b><p>{{$ruangan_ya->sum('jumlah_PC')}}</h2></b></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/ruangan">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pembagian Peserta Ujian
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Kelas</th>
                        <th>Nama Ruangan</th>
                        <th>Sesi</th>
                        <th>No PC</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ujian as $u)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><p class="upper">{{ $u->nama_peserta }}</p></td>
                            <td>{{ $u->kelas}}</td>
                            <td>{{ $u->nama_ruangan}}</td>
                            <td>{{ $u->nama_sesi}}</td>
                            <td>{{ $u->nomor_pc}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
