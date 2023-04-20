<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIUSEK</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>


@php $no = 1; @endphp

<br>

    @foreach($ujian as $u)
  <style type="text/css">
   .kotak {
      border-style: solid;
      width: 10.5cm;
      height: 8cm;
      padding-left: 5px;
      padding-right: 5px;
    }
    .logo-kartu{
        width: 70px;
      height: 70px;
    }
  </style>

  <div class="kotak">
   <img class="float-start logo-kartu" src ="/image/smk.png"><h6 class = "text-center mt-2">KARTU PESERTA<br> UJIAN AKHIR SEMESTER GENAP<br> TAHUN PELAJARAN 2022/2023<hr></h6>
   <table class="table table-sm table-borderless">
  <tbody>
    <tr>
      <th scope="row"> NAMA PESERTA</th>
      <td> : {{ $u->nama_peserta}}</td>
    </tr>
    <tr>
      <th scope="row">KELAS </th>
      <td>: {{ $u->kelas }}</td>
    </tr>
    <tr>
      <th scope="row">  Username </th>
      <td>: {{ $u->nis}}</td>
    </tr>
    <tr>
      <th scope="row"> Password </th>
      <td>: {{ $u->pass}} </td>
    </tr>
    <tr>
      <th scope="row">  Ruang / Sesi</th>
      <td>: {{ $u->nama_ruangan }} / {{ $u->nama_sesi }}</td>
    </tr>
    <tr>
      <th scope="row">  Nomor PC</th>
      <td>: {{ $u->nomor_pc}}</td>
    </tr>
  </tbody>
</table>

      @endforeach


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/scripts.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/assets/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/datatables-simple-demo.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>

</body>
</html>
<script type="text/javascript">
    window.print();
    </script>
