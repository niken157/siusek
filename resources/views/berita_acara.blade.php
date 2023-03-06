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
    <body class="sb-nav-fixed">
        <style>
            .upper { text-transform: uppercase; }
        </style>

        <img src="/image/{{ $setting->logo}}" class="rounded mx-auto d-block" height="100" width="100" alt="...">
        <h4 class="text-center"><b>BERITA ACARA</b></h4>
        <h6 class="text-center upper">{{ $setting->nama_ujian}} {{ $setting->semester}}</h6>
        <h6 class="text-center">SMK PGRI WLINGI</h6>
        <h6 class="text-center">TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</h6>
       <hr class="border border-dark opacity-75">
        <p>
            Pada hari ini ............... Tanggal .................  Bulan  ............... Tahun .................................................. <br>
a.	Telah diselenggarakan {{ $setting->nama_ujian}} {{ $setting->semester}} dari pukul ...... : ...... sampai dengan ...... : ......
        </p>
        <table class="table">
            <tbody>
              <tr>
                <td>Pada Sekolah</td>
                <td>:</td>
                <td>SMK PGRI WLINGI</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>Jln. Jendral Sudirman No. 86 Wlingi - Blitar</td>
              </tr>
              <tr>
                <td>Grup / Sesi</td>
                <td>:</td>
                <td>1   /   2   /  3   /  4  /  5   /  6   /  7   /  8         *)</td>
              </tr>
              <tr>
                <td>Ruang</td>
                <td>:</td>
                <td>RUANG 1   /   2   /  3  /  4  /  5   /  6  /  7  /  8 /  9  / 10  *)</td>
              </tr>
              <tr>
                <td>Jumlah Peserta</td>
                <td>:</td>
                <td>.............. orang</td>
              </tr>
              <tr>
                <td>Jumlah hadir</td>
                <td>:</td>
                <td>.............. orang</td>
              </tr>
              <tr>
                <td>Yang tidak hadir</td>
                <td>:</td>
                <td>.............. orang, yakni :</td>
              </tr>

                              <table class="table"style="border: 1px solid black;">
                                <tbody>
                              <tr>
                              <td style="border: 1px solid black ;"class="text-center"width="10px"><b>NO</b></td>
                              <td style="border: 1px solid black;"class="text-center" width="270px"><b>NAMA</b></td>
                              <td style="border: 1px solid black;"class="text-center"><b>KELAS</b></td>

                              <td style="border: 1px solid black;"class="text-center"width="10px"><b>NO</b></td>
                              <td style="border: 1px solid black;"class="text-center"width="270px"><b>NAMA<b></td>
                              <td style="border: 1px solid black;"class="text-center"><b>KELAS</b></td>
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"class="text-center"><b> 1</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>

                              <td style="border: 1px solid black;" class="text-center"><b>5</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;" class="text-center"><b>2</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>

                              <td style="border: 1px solid black;"class="text-center"><b>6 </b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"class="text-center"> <b>3</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>

                              <td style="border: 1px solid black;"class="text-center"><b> 7</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>

                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"class="text-center"> <b>4</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>

                              <td style="border: 1px solid black;" class="text-center"><b> 8</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                            </tbody>
                            </table>
        <p>
        b. Catatan selama pelaksanaan {{ $setting->nama_ujian}} {{ $setting->semester}}
        ................................................................................................................................................................................................................................................
        ................................................................................................................................................................................................................................................
</p>
<p>
        Berita acara ini dibuat dengan sesungguhnya.<br>
      <b>Pengawas</b> <br>
      <table>
            <tbody>
              <tr>
                <td>1. Tanda Tangan </td>
                <td>:</td>
                <td>.................</td>
              </tr>
              <tr>
                <td>&nbsp;Nama</td>
                <td>:</td>
                <td>.................</td>
              </tr>
              <tr>
                <td>&nbsp;NIP</td>
                <td>:</td>
                <td>.................</td>
              </tr>
              <tbody>
            </table>
            <br></p>
            <p>
  <i>Keterangan</i> :*) Lingkari yang sesuai
</p>
            </tbody>
          </table>
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
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js" ></script>
<script type="text/javascript">
    window.print();
    </script>
