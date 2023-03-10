
@extends('template')

@section('content')
<br>
    <div class="card mb-4">
    <div class="card-header">
        <span style=" font-size: 1cm;">
            DATA KARTU UJIAN
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-warning" href="/kartu" target="_blank" role="button"><i class="fa-solid fa-print" title="cetak kartu semua peserta"></i> Cetak Kartu</a>
            <a class="align-items-center justify-content-between btn btn-primary" href="/pembagian/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
            <a class="align-items-center justify-content-between btn btn-primary" href="/pembagian/generate" role="button"><i class="fas fa-fw fa-plus"></i> Generate</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple" >
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
                                <!-- Button trigger modal -->
                            <button type="button" title="Detail Kartu Peserta" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $u->id_ujian }}">
                                <i class="fa-solid fa-search"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $u->id_ujian }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kartu Ujian</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="/kartu_detail/{{ $u->id_ujian }}" height="220px" width="400px"></iframe>
                                    {{-- @foreach($ujian as $u)
                                    <table class="div">
                                        <tr style="border: 1px solid black ;">
                                            <td><img src="/image/{{ $setting->logo}}" class="rounded" height="40" width="40" alt="..."></td>
                                            <td colspan="4">
                                                <p class="upper"><b>KARTU PESERTA SEMESTER {{ $setting->semester}}</b></p>
                                                <p>TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</p>
                                            </td>
                                        </tr>
                                        <tr class="kotak1">
                                            <td><p>NAMA PESERTA :</p></td>
                                            <td colspan="6"><p>&nbsp&nbsp{{ $u->nama_peserta}}</p></td>
                                        </tr>
                                        <tr class="kotak2">
                                            <td><p>KELAS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</p></td>
                                            <td colspan="6"><p>&nbsp&nbsp{{ $u->kelas }}</p></td>
                                        </tr>
                                        <tr class="kotak1">
                                            <td><p>Ruang / Sesi</p></td>
                                            <td><p>&nbsp&nbsp{{ $u->nomer_ruangan }} / {{ $u->no_sesi }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                                            <td><p>No. Komputer</p></td>
                                            <td><p>&nbsp&nbsp{{ $u->nomor_pc}}</p></td>
                                        </tr>
                                        <tr class="kotak2">
                                            <td><p>Username</p></td>
                                            <td><p>&nbsp&nbsp{{ $u->nis}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                                            <td><p>Password</p></td>
                                            <td><p>&nbsp&nbsp{{ $u->pass}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                                        </tr>
                                    </table>
                                    @endforeach --}}
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <a class="btn btn-outline-warning" target="_blank"  href="/kartu_satuan/{{ $u->id_ujian }}" role="button" title="Cetak Kartu Peserta"><i class="fa-solid fa-print"></i></a>
                                <a class="btn btn-outline-primary" href="/pembagian/edit/{{ $u->id_ujian }}" role="button" title="Edit Data Kartu"><i class="fas fa-fw fa-edit"></i></a>
                                <a class="btn btn-outline-danger" href="/pembagian/hapus/{{ $u->id_ujian }}" role="button" title="Hapus Data Kartu"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
