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
    <body class="sb-nav-fixed">
<style>
    .upper { text-transform: uppercase; }
    .besar { font-size: 4cm; }
    .sedang { font-size: 3cm;
    color: #ff0000; }
</style>
        <h1 class="text-center upper">{{ $setting->nama_ujian}}</h1>
        <h1 class="text-center">TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</h1>
        <img src="/image/{{ $setting->logo}}" class="rounded mx-auto d-block" height="200" width="200" alt="..."><br><br>
        <div class="card">
            <div class="card-body text-center">
              <b><p class="besar">{{ $ruangan->nama_ruangan}}</p></b>
              <div class="card text-center">
                <div class="card-body">
                    <b><p class="sedang">{{ $ruangan->keterangan_ruangan}}</p></b>
                </div>
              </div>
            </div>
          </div>
          <br><br>
        <h5 class="text-center">SMK PGRI WLINGI</h5>
        <h5 class="text-center">Jl Jenderal Sudirman No.86 Wlingi</h5>
        <h5 class="text-center">Kabupaten Blitar</h5>
    </body>
</html>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{ asset('admin/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/datatables-simple-demo.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js" ></script>
<script type="text/javascript">
    window.print();
    </script>
