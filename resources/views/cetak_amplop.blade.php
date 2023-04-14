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

p{
        font-size: 20px;
        line-height: 70%;
    }

    .tb {
        margin-left: 15px;
         height: 4cm;
        width: 7cm;
        margin-bottom: 20px;
    }

    .tr {
        margin-left: 15px;
         height: 2cm;
        width: 7cm;
        margin-bottom: 20px;
    }

.tb {
  border: 5px solid orange;
 }

 .tr {
  border: 5px solid orange;
 }

    .upper { text-transform: uppercase;
     font-size: 5cm;
   font-size: 3cm;
}

td {
    padding: 5px;
    }
</style>

        <table class="tb";>
        <td class="card-text-center">
               <h3 class="text-center"><b>RUANG</b></h3>
           <b><h3 class="text-center">{{ $ruangan->nama_ruangan}}</h3></b>

           </td>

<!-- </tr> -->
<tr>
        <th style="width:10%"></th>

</tr>
</td>
<table class="tr">
          <tr class="panel-body post-body table-text-center">
            <td class="table-body post-body">
                @php
                $ujian = DB::table('peserta')
                     ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
                     ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
                     ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
                     //->where('nama_ruangan', 'nama_ruangan')
                     ->groupBy('ruangan.keterangan_ruangan')
                    ->first();
                    $tingkat =substr($ujian->kelas, 0, 2);
                @endphp
             <td><b><p class="text-center" >TINGKAT {{ $tingkat}} </p></b></td>
</td>
</td>
</tr>
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
