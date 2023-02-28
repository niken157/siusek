
@extends('template')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container text-center">
            <div class="row">
              <div class="col-2">
                <table class="table table-bordered">
                    <tr>
                        <td><h6 class="text-center">GRUP / SESI</h6></td>
                    </tr>
                    <tr>
                        <td><h1 class="text-center">{{ $no_sesi}}</h1></td>
                    </tr>
                </table>
              </div>
              <div class="col-8">
                <h3 class="text-center"><b> D A F T A R  &nbsp&nbsp  H A D I R</b></h3>
                <h5 class="text-center">PESERTA UJIAN AKHIR SEMESTER GENAP</h5>
                <h5 class="text-center">SMK PGRI WLINGI</h5>
                <h5 class="text-center">TAHUN PELAJARAN 2023 / 2024</h5>
              </div>
              <div class="col-2">
                <table class="table table-bordered">
                    <tr>
                        <td><h6 class="text-center">RUANG / LAB</h6></td>
                    </tr>
                    <tr>
                        <td><h1 class="text-center">{{ $nomer_ruangan}}</h1></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
          <br>
          <div class="container text-center">
            <div class="row">
              <div class="col-7">
                <table>
                    <tr>
                        <td><h6>HARI,TANGGAL</h6></td>
                        <td><h6>&nbsp:</h6></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><h6>MATA UJIAN</h6></td>
                        <td><h6>&nbsp:</h6></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><h6></h6></td>
                        <td><h6></h6></td>
                        <td><h6>1.___________________________</h6></td>
                    </tr>
                </table>
              </div>
              <div class="col-5">
                <table>
                    <tr>
                        <td><h6>WAKTU &nbsp :</h6></td>
                        <td><h6>____.____ - ____.____</h6></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><h6>&nbsp</h6></td>
                        <td><h6>&nbsp</h6></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"><h6>2.___________________________</h6></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered tabel">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">NO UJIAN</th>
                        <th class="text-center">NAMA PESERTA UJIAN</th>
                        <th class="text-center">KELAS</th>
                        <th class="text-center">TANDA TANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1;  $noa = 1; @endphp
                    @foreach($ujian as $p)
                        <tr>
                            <td class="text-center">{{ $p->nomor_pc }}</td>
                            <td class="text-center">{{ $p->nis }}</td>
                            <td>{{ $p->nama_peserta }}</td>
                            <td class="text-center">{{ $p->kelas }} {{ $p->jurusan }}</td>
                            <td>{{ $noa++ }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div style="float: right">
                <table>
                    <tr>
                        <td><h6>Blitar, ..... Desember 2023 <br>
                            Pengawas
                            </h6></td>
                    </tr>
                    <tr>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td><h6>_______________________</h6></td>
                    </tr>
                </table>
              </div>
        </div>
    </div>
  </div>
@endsection
<script type="text/javascript">
    window.print();
    </script>
