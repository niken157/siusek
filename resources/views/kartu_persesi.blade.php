<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nama Webnya</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
<style>
    p{
        font-size: 9px;
        line-height: 70%;
    }
    .card-body{
        padding: 10px;
        margin-left: 10px;
        margin-right: 10px;
    }
    .upper { text-transform: uppercase; }
</style>
@php $no = 1; @endphp

<br>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($ujian as $u)
    <div class="col-4">
        <div class="card-body" style="border: 1px solid black;">
            <div class="row">
              <div class="col-sm-3">
                <img src="/image/{{ $setting->logo}}" class="rounded" height="40" width="40" alt="...">
              </div>
              <div class="col-sm-9">
                <p class="upper"><b>KARTU UJIAN PESERTA {{ $setting->semester}}</b></p>
                <p>TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</p>
              </div>
            </div>
          </div>
    <div class="card-body" style="border: 1px solid black;">
        <table>
            <tr>
                <td><p>NAMA PESERTA</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>&nbsp&nbsp{{ $u->nama_peserta}}</p></td>
            </tr>
            <tr>
                <td><p>KELAS</p></td>
                <td><p> &nbsp:</p></td>
                <td><p>&nbsp&nbsp{{ $u->kelas }} {{ $u->jurusan }}</p></td>
            </tr>
        </table>
    </div>
    <div class="card-body" style="border: 1px solid black;">
        <table >
            <tr>
                <div class="row">
                    <div class="col">
                        <td><p>Ruang / Sesi</p></td>
                        <td><p> &nbsp&nbsp&nbsp:</p></td>
                        <td><p>&nbsp&nbsp{{ $u->nomer_ruangan }} / {{ $u->no_sesi }}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                    </div>
                    <div class="col">
                        <td><p>No. Komputer</p></td>
                        <td><p> &nbsp&nbsp&nbsp:</p></td>
                        <td><p>&nbsp&nbsp{{ $u->nomor_pc}}</p></td>
                    </div>
                  </div>
            </tr>
            <tr>
                <div class="row">
                    <div class="col">
                        <td><p>Username</p></td>
                        <td><p> &nbsp&nbsp&nbsp:</p></td>
                        <td><p>&nbsp&nbsp{{ $u->nis}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p></td>
                    </div>
                    <div class="col">
                        <td><p>Password</p></td>
                        <td><p> &nbsp&nbsp&nbsp:</p></td>
                        <td><p>&nbsp&nbsppass</p></td>
                    </div>
                </div>
        </table>
    </div><br><br>
    </div>  @endforeach
  </div>

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
