
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
        font-size: 12px;
    }
    .huruf{
        font-size: 10px;
        line-height: 70%;
    }
    .upper { text-transform: uppercase; }
    .row {
        border-top: 1px solid black ;
        margin-bottom: -10px;
    }
    .mar {
        margin-top: -3px;
    }
</style>
<div class="container-fluid ">
            <div class="row border-top-0">
              <div class="col-3">
                <table class="table table-bordered" style="border: 1px solid black;" >
                    <tr>
                        <td><h6 class="text-center">GRUP/SESI</h6></td>
                    </tr>
                    <tr>
                        <td><h3 class="text-center">{{ $nama_sesi}}</h3></td>
                    </tr>
                </table>
              </div>
              <div class="col-6">
                <h4 class="text-center"><b> D A F T A R  &nbsp&nbsp  H A D I R</b></h4>
                <h6 class="text-center upper">PESERTA {{ $setting->nama_ujian}}</h6>
                <h6 class="text-center">SMK PGRI WLINGI</h6>
                <h6 class="text-center">TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</h6>
              </div>
              <div class="col-3">
                <table class="table table-bordered" style="border: 1px solid black;">
                    <tr>
                        <td><h6 class="text-center">RUANG/LAB</h6></td>
                    </tr>
                    <tr>
                        <td><h3 class="text-center">{{ $nama_ruangan}}</h3></td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-7">
                <table>
                    <tr>
                        <td><p><b>HARI,TANGGAL</b> </p></td>
                        <td><p>&nbsp&nbsp:</p></td>
                        <td>&nbsp&nbsp&nbsp_________________________</td>
                    </tr>
                    <tr>
                        <td><p><b>WAKTU</b> </p></td>
                        <td><p>&nbsp&nbsp:</p></td>
                        <td><p>&nbsp&nbsp&nbsp__________________________________</p></td>
                    </tr>
                </table>
              </div>
              <div class="col-5">
                <table>
                    <tr>
                        <td><p><b>MATA UJIAN</b> </p></td>
                        <td><p>&nbsp&nbsp:</p></td>
                        <td><p>&nbsp1.&nbsp___________________________</p></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p>&nbsp2.&nbsp___________________________</p></td>
                    </tr>
                </table>
              </div>
            </div>
          <div class="card-body">
            <table class="table table-bordered huruf" style="border: 1px solid black;">
                <thead>
                    <tr>
                        <th class="text-center" style="witdh: 1cm">NO</th>
                        <th class="text-center">NO UJIAN</th>
                        <th class="text-center">NAMA PESERTA UJIAN</th>
                        <th class="text-center"  style=" width: 3cm">KELAS</th>
                        <th class="text-center">TANDA TANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; $ttd = 1; @endphp
                    @foreach($ujian as $p)
                        <tr>
                            <td class="text-center">{{ $p->nomor_pc }}.</td>
                            <td class="text-center">{{ $p->nis }}</td>
                            <td class="upper huruf">{{ $p->nama_peserta }}</td>
                            <td class="text-center">{{ $p->kelas }}</td>
                            @if ($ttd % 2 == 0)
                                <td class="text-center">{{ $ttd++ }}.</td>
                            @else
                                <td>{{ $ttd++ }}.</td>
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div style="float: right">
                <table>
                    <tr>
                        <td><p>Blitar, ....................... <br>
                            Pengawas
                            </p><br><b>_______________________</b></td>
                    </tr>
                </table>
              </div>
        </div>
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
