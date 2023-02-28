
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
                <h3 class="text-center"><b> D A F T A R    H A D I R</b></h3>
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

          <div class="card-body">
            <table class="table table-bordered">
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
