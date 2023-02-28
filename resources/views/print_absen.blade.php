
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
                        <td><h1 class="text-center">1</h1></td>
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
                        <td><h1 class="text-center">1</h1></td>
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
                    <tr>
                        <td>NO</td>
                        <td>NO UJIAN</td>
                        <td>NAMA PESERTA UJIAN</td>
                        <td>KELAS</td>
                        <td>TANDA TANGAN</td>
                    </tr>
                    {{-- @php $no = 1; @endphp
                    @foreach($peserta as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama_peserta }}</td>
                            <td>{{ $p->nis }}</td>
                            <td>{{ $p->kelas }}</td>
                            <td>{{ $p->jurusan }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="/peserta/edit/{{ $p->id_peserta }}" role="button"><i class="fas fa-fw fa-edit"></i></a>

                                <a class="btn btn-outline-danger" href="/peserta/hapus/{{ $p->id_peserta }}" role="button"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
  </div>
@endsection
<script type="text/javascript">
    window.print();
    </script>
