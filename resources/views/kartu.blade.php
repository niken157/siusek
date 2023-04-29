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
<style>
    p{
        font-size: 7px;
    }
    .div {
        margin-left: 15px;
        /* height: 10cm; */
        width: 8cm;
        height: 4cm;
        /* margin-bottom: 0px; */
    }
    td {
    padding: 3px;
    }
    .upper { text-transform: uppercase; }
    .kotak1 {

border-top: 1px solid black ;
border-left: 1px solid black ;
border-right: 1px solid black ;
border-bottom:1px solid black ;
}
h1 {
  font-size: 10px;
  text-align: center;
}
</style>
@php $no = 1; @endphp


<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($ujian as $u)
    <table class="div">
        <tr style="border: 1px solid black ;">
            <td><img src="/image/{{ $setting->logo}}" class="rounded" height="50" width="50" alt="..."></td>
            <td><h1 class="upper"><b>KARTU PESERTA <br>{{ $setting->nama_ujian}} <br>&nbsp&nbspTAHUN PELAJARAN {{ $setting->tahun_ajaran}}</b>
            </td>
        </tr>
        <tr class="kotak1" >
            <td><p>NAMA PESERTA <br> KELAS &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br> <b>Username</b><br><b>Password</b><br>Ruang / Sesi<br>No. Komputer</p></td>
            <td colspan="6"><p>:&nbsp&nbsp{{ $u->nama_peserta}} <br> :&nbsp&nbsp{{ $u->kelas }} <br><b> @if ($u->username == 'nis'):&nbsp&nbsp{{ $u->nis}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @else :&nbsp&nbsp{{ $u->username}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @endif </b><br><b>:&nbsp&nbsp{{ $u->pass}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b><br>:&nbsp&nbsp{{ $u->nama_ruangan }} / {{ $u->nama_sesi }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br>:&nbsp&nbsp{{ $u->nomor_pc}}</p></td>
        </tr>
    </table>
      @endforeach
  </div>
<br>
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
