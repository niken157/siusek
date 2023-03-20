
@extends('template')

@section('content')
<style>
    .upper { text-transform: uppercase; }
</style>
<br>
    <div class="card mb-4">
    <div class="card-header">
        <span style=" font-size: 1cm;">
            DATA KARTU PESERTA
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-warning" href="/kartu" target="_blank" role="button"><i class="fa-solid fa-print" title="cetak kartu semua peserta"></i> Cetak Kartu</a>
            <a class="align-items-center justify-content-between btn btn-primary" href="/kartu_peserta/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
            {{-- <a class="align-items-center justify-content-between btn btn-primary" href="/kartu_peserta/generate" role="button"><i class="fas fa-fw fa-plus"></i> Generate</a> --}}

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PESERTA</th>
                        <th>RUANGAN</th>
                        <th>NAMA SESI</th>
                        <th>NO PC</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ujian as $u)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td class="upper">{{ $u->nama_peserta}}</td>
                            <td>R-{{ $u->nomer_ruangan}}</td>
                            <td>SESI-{{ $u->no_sesi}}</td>
                            <td>PC-{{ $u->nomor_pc}}</td>
                            <td>
        <a href="" class="btn btn-outline-success" data-toggle="modal" title="Detail Kartu Peserta"
        data-target="#modal<?php echo $u->id_ujian; ?>"><i class="fa-solid fa-search"></i></a>

    <div class="modal fade" id="modal<?php echo $u->id_ujian; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Kartu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                <div class="modal-body">
                    <table class="div">
                        {{-- <tr style="border: 1px solid black ;">
                            <td><img src="/image/{{ $setting->logo}}" class="rounded" height="40" width="40" alt="..."></td>
                            <td colspan="4">
                                <p class="upper"><b>KARTU PESERTA SEMESTER {{ $setting->semester}}</b></p>
                                <p>TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</p>
                            </td>
                        </tr> --}}
                        <tr class="kotak1">
                            <td><p>NAMA PESERTA </p></td>
                            <td colspan="6"><p>:&nbsp&nbsp{{ $u->nama_peserta}}</p></td>
                        </tr>
                        <tr class="kotak2">
                            <td><p>KELAS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                            <td colspan="6"><p>:&nbsp&nbsp{{ $u->kelas }}</p></td>
                        </tr>
                        <tr class="kotak1">
                            <td><p>Ruang / Sesi</p></td>
                            <td><p>:&nbsp&nbsp{{ $u->nomer_ruangan }} / {{ $u->no_sesi }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                            <td><p>No. Komputer</p></td>
                            <td><p>:&nbsp&nbsp{{ $u->nomor_pc}}</p></td>
                        </tr>
                        <tr class="kotak2">
                            <td><p>Username</p></td>
                            @if ($u->username == 'nis')
                            <td><p>:&nbsp&nbsp{{ $u->nis}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                            @else
                            <td><p>:&nbsp&nbsp{{ $u->username}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                            @endif
                            <td><p>Password</p></td>
                            <td><p>:&nbsp&nbsp{{ $u->pass}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
                            <a class="btn btn-outline-warning" target="_blank"  href="/kartu_satuan/{{ $u->id_ujian }}" role="button" title="Cetak Kartu Peserta"><i class="fa-solid fa-print"></i></a>
                                <a class="btn btn-outline-primary" href="/kartu_peserta/edit/{{ $u->id_ujian }}" role="button" title="Edit Data Kartu"><i class="fas fa-fw fa-edit"></i></a>
                                <a class="btn btn-outline-danger" href="/kartu_peserta/hapus/{{ $u->id_ujian }}" role="button" title="Hapus Data Kartu"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
