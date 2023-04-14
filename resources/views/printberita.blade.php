<?php
$tanggal = date('y-m-d');
$day = date('D', strtotime($tanggal));
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);
$bulan = date('F', strtotime($tanggal));
$bulanList = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
);
?>
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
            .capitalize { text-transform: capitalize; }
            body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        font-size: 18pt;
    }
    .box1{
width:250px;
height:150px;
border:solid 3px black;
}
        </style>

        <img src="/image/{{ $setting->logo}}" class="rounded mx-auto d-block" height="150" width="150" alt="...">
        <h1 class="text-center"><b>BERITA ACARA</b></h1>
        <h3 class="text-center upper">{{ $setting->nama_ujian}}</h3>
        <h3 class="text-center">SMK PGRI WLINGI</h3>
        <h3 class="text-center">TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</h3>
       <hr class="border border-dark opacity-75">
        <p class="capitalize">
            Pada hari ini ............ Tanggal ....... Bulan  ........... Tahun .........<br >
a.	Telah diselenggarakan {{ $setting->nama_ujian}} dari pukul ...... : ...... sampai dengan ...... : ......
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
                <td>{{ $nama_sesi}}</td>
              </tr>
              <tr>
                <td>Ruang</td>
                <td>:</td>
                <td>{{ $nama_ruangan}}</td>
              </tr>
              @php
              $u = DB::table('peserta')
              ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
              ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
              ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
              ->where([
                  ['ruangan.nama_ruangan', '=', $nama_ruangan],
                  ['sesi.nama_sesi', '=', $nama_sesi] ])
              ->orderBy('nomor_pc', 'asc')
              ->get();
          @endphp
              <tr>
                <td>Jumlah Peserta</td>
                <td>:</td>
                <td>{{ $u->count()}} orang</td>
              </tr>
              <tr>
                <td>Jumlah hadir</td>
                <td>:</td>
                <td>.......  orang</td>
              </tr>
              <tr>
                <td>Yang tidak hadir</td>
                <td>:</td>
                <td>........ orang, yakni :</td>
              </tr>
              <tr>
                <td colspan="3"><p>
                    ...........................................................................................................................................................................................................................................................................................................................
                    ...........................................................................................................................................................................................................................................................................................................................
                    ...........................................................................................................................................................................................................................................................................................................................
</p></td>
              </tr>


                            </tbody>
                            </table>
        <p>
        b. Catatan selama pelaksanaan {{ $setting->nama_ujian}}<br>
        ...........................................................................................................................................................................................................................................................................................................................
        ...........................................................................................................................................................................................................................................................................................................................
        ...........................................................................................................................................................................................................................................................................................................................


    </p>
<p>
        Berita acara ini dibuat dengan sesungguhnya.<br>
      <b>Pengawas</b>
      <table>
            <tbody>
                <tr>
                    <td>1. Tanda Tangan :</td>
                </tr>
              <tr>
                <td><div class="box1"></div></td>
              </tr>
              <tr>
                <td>&nbsp;Nama</td>
                <td>:</td>
                <td>....................................</td>
              </tr>
              <tr>
                <td>&nbsp;NIP</td>
                <td>:</td>
                <td>....................................</td>
              </tr>
              <tbody>
            </table>
            <br></p>
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
