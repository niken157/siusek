
@extends('template')

@section('content')
@php $no = 1; @endphp
@foreach($ujian as $u)
<div class="card col-6">
    <div class="card-header">
        <div class="container">
            <div class="row">
              <div class="col-2">
                <img src="{{ asset('image/smk.png')}}" class="rounded" height="55" width="55" alt="...">
              </div>
              <div class="col-10">
                <h5>KARTU UJIAN PESERTA GANJIL</h5>
                <p>TAHUN PELAJARAN 2023/2024</p>
              </div>
            </div>
          </div>
    </div>
    <div class="card-header">
        <table>
            <tr>
                <td><p>NAMA PESERTA</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>{{ $u->nama_peserta}}</p></td>
            </tr>
            <tr>
                <td><p>KELAS</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>{{ $u->kelas }} {{ $u->jurusan }}</p></td>
            </tr>
        </table>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td><p>Username</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>{{ $u->nis}}</p></td>
            </tr>
            <tr>
                <td><p>Password</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>pass</p></td>
            </tr>
            <tr>
                <td><p>Ruang / Sesi</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>{{ $u->nomer_ruangan }} / {{ $u->no_sesi }}</p></td>
            </tr>
            <tr>
                <td><p>No. Komputer</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>{{ $u->nomor_pc}}</p></td>
            </tr>
        </table>
    </div>
  </div><br>
  @endforeach
@endsection
<script type="text/javascript">
    window.print();
    </script>
