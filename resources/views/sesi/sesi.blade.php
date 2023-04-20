@extends('template')

@section('content')
<br>
    <div class="card mb-4">
        <div class="card-header">
            <!-- <i class="fas fa-table me-1"></i> -->
            <span style=" font-size: 1cm;">
            DATA SESI UJIAN
            <span style="float: right">
            <a class="align-items-center justify-content-between btn btn-primary" href="/sesi/tambah" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            @php
            $ruangan = DB::table('ruangan')
            ->where('keterangan', '=', 'ya')
            ->get();
                $jumlah_peserta = DB::table('peserta')->count();//banyak peserta
                $jumlah_semua_pc= $ruangan->sum('jumlah_PC');//total pc tersedia
                $jumlah_sesi = $jumlah_peserta / $jumlah_semua_pc ;
            @endphp
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Jumlah PC &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                        <input type="text" id="jumlah_pc" class="form-control" value="{{ $jumlah_semua_pc }}" aria-label="Username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Jumlah Peserta</span>
                        <input type="text" id="jumlah_peserta" class="form-control" value="{{ $jumlah_peserta }}" aria-label="Server">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Hasil &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                        <input type="text" id="total_sesi" readonly class="form-control" value="{{ ceil($jumlah_sesi) }}" aria-label="Server">
                        <span class="input-group-text">Sesi</span>
                      </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#jumlah_peserta, #jumlah_pc, #ingin_sesi").keyup(function() {
                            var jumlah_pc  = $("#jumlah_pc").val();
                            var jumlah_peserta = $("#jumlah_peserta").val();

                            var total_sesi = parseInt(jumlah_peserta) / parseInt(jumlah_pc);
                            $("#total_sesi").val(Math.ceil(total_sesi));

                            var ingin_sesi  = $("#ingin_sesi").val();
                            var pc_dibutuhkan = parseInt(jumlah_peserta) / parseInt(ingin_sesi);
                            $("#pc_dibutuhkan").val(Math.ceil(pc_dibutuhkan));

                            var pc_kurang = parseInt(Math.ceil(pc_dibutuhkan)) - parseInt(jumlah_pc);
                            $("#pc_kurang").val(Math.ceil(pc_kurang));
                        });
                    });
                </script>
                <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Jumlah Sesi Yang Diinginkan</span>
                                <input type="text" id="ingin_sesi" class="form-control" aria-label="Server">
                                <span class="input-group-text">Sesi</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Jumlah PC yang dibutuhkan</span>
                                <input type="text" id="pc_dibutuhkan" readonly class="form-control" aria-label="Server">
                                <span class="input-group-text">PC</span>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">PC kurang &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                <input type="text" id="pc_kurang" readonly class="form-control" aria-label="Server">
                                <span class="input-group-text">PC</span>
                              </div>
                </div>
              </div>
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA SESI</th>
                        <th>MULAI</th>
                        <th>SELESAI</th>
                        <th>KETERANGAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($sesi as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama_sesi}}</td>
                            <td>{{ $p->jam_awal}}</td>
                            <td>{{ $p->jam_berakhir}}</td>
                            <td>{{ $p->keterangan}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/sesi/edit/{{ $p->id_sesi }}" role="button"title="Edit Data Sesi"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="/sesi/hapus/{{ $p->id_sesi }}" role="button"title="Hapus Data Sesi"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

@endsection
