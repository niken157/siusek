
@extends('template')

@section('content')
<style>
    p{
        font-size: 14px;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="container text-center">
            <div class="row">
              <div class="col-2">
                <table class="table table-bordered" style="border: 1px solid black;">
                    <tr>
                        <td><h6 class="text-center">GRUP / SESI</h6></td>
                    </tr>
                    <tr>
                        <td><h2 class="text-center">{{ $no_sesi}}</h1></td>
                    </tr>
                </table>
              </div>
              <div class="col-8">
                <h4 class="text-center"><b> D A F T A R  &nbsp&nbsp  H A D I R</b></h4>
                <h6 class="text-center">PESERTA UJIAN AKHIR SEMESTER GENAP</h6>
                <h6 class="text-center">SMK PGRI WLINGI</h6>
                <h6 class="text-center">TAHUN PELAJARAN 2023 / 2024</h6>
              </div>
              <div class="col-2">
                <table class="table table-bordered" style="border: 1px solid black;">
                    <tr>
                        <td><h6 class="text-center">RUANG / LAB</h6></td>
                    </tr>
                    <tr>
                        <td><h2 class="text-center">{{ $nomer_ruangan}}</h1></td>
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
                        <td><p><b>HARI,TANGGAL</b> </p></td>
                        <td><p>&nbsp:</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p><b>MATA UJIAN</b> </p></td>
                        <td><p>&nbsp:</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p></p></td>
                        <td><p></p></td>
                        <td><p>1.___________________________</p></td>
                    </tr>
                </table>
              </div>
              <div class="col-5">
                <table>
                    <tr>
                        <td><p>WAKTU &nbsp :</p></td>
                        <td><p>____.____ - ____.____</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p>&nbsp</p></td>
                        <td><p>&nbsp</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"><p>2.___________________________</p></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO UJIAN</th>
                        <th>NAMA PESERTA UJIAN</th>
                        <th>KELAS</th>
                        <th>TANDA TANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($ujian as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nomor_pc }}</td>
                            <td>{{ $p->nama_peserta }}</td>
                            <td>{{ $p->kelas }} {{ $p->jurusan }}</td>
                            <td>1</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
@endsection
<script type="text/javascript">
    window.print();
    </script>
