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

@extends('template')

@section('content')
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
        </style>

        <img src="/image/{{ $setting->logo}}" class="rounded mx-auto d-block" height="100" width="100" alt="...">
        <h4 class="text-center"><b>BERITA ACARA</b></h4>
        <h6 class="text-center upper">{{ $setting->nama_ujian}} {{ $setting->semester}}</h6>
        <h6 class="text-center">SMK PGRI WLINGI</h6>
        <h6 class="text-center">TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</h6>
       <hr class="border border-dark opacity-75">
        <p>
            Pada hari ini <?php echo $dayList[$day] ?> Tanggal <?php echo date('d '); ?> Bulan  <?php echo $bulanList[$bulan] ?> Tahun <?php echo date('Y '); ?><br >
a.	Telah diselenggarakan {{ $setting->nama_ujian}} {{ $setting->semester}} dari pukul {{ $sesi->jam_sesi}} sampai dengan ...... : ......
        </p>
        <form method="GET" name="frmpost" action="/cetak_berita/{{ $nomer_ruangan }}/{{ $no_sesi }}" target="_blank">
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
                <td>{{ $no_sesi}}</td>
              </tr>
              <tr>
                <td>Ruang</td>
                <td>:</td>
                <td>{{ $nomer_ruangan}}</td>
              </tr>
              @php
              $u = DB::table('peserta')
              ->join('ujian', 'peserta.id_peserta', '=', 'ujian.id_peserta')
              ->join('ruangan', 'ujian.id_ruangan', '=', 'ruangan.id_ruangan')
              ->join('sesi', 'ujian.id_sesi', '=', 'sesi.id_sesi')
              ->where([
                  ['ruangan.nomer_ruangan', '=', $nomer_ruangan],
                  ['sesi.no_sesi', '=', $no_sesi] ])
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
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="jumlah_hadir[]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">Orang</span>
                      </div>
                </td>
              </tr>
              <tr>
                <td>Yang tidak hadir</td>
                <td>:</td>
                <td><div class="input-group mb-3">
                    <input type="text" class="form-control" name="tdk_hadir[]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Orang</span>
                  </div>, yakni :</td>
              </tr>
              <tr>
                <td>
                    <div class="mb-3">
                        <label for="tdk_masuk">Nama Peserta Didik Yang Tidak Hadir :</label>
                        <select name="tdk_masuk[]" class="selectpicker  form-control" data-live-search="true" multiple placeholder="Pilih Peserta" id="multiple-select-field">
                            <option value="">Pilih Peserta</option>
                            @php
                                $peserta = DB::table('peserta')->get();
                            @endphp
                        @foreach($peserta as $p)
                        <option name="tdk_masuk[]" value="{{ $p->nama_peserta }}">{{ $p->nama_peserta }}</option>
                        @endforeach
                        </select>
                    </div>
                </td>
              </tr>
                            </tbody>
                            </table>
        <p>
        b. Catatan selama pelaksanaan {{ $setting->nama_ujian}} {{ $setting->semester}} <br>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Catatan:</label>
            <textarea name="catatan[]" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
</p>
<p>
        Berita acara ini dibuat dengan sesungguhnya.<br>
      <b>Pengawas</b> <br>
      <table>

            <tbody>
              <tr>
                <td>1. Tanda Tangan </td>
                <td>:</td>
                <td>

                <DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <title>Title</title>
        <style>
            /* mengatur ukuran canvas tanda tangan  */
            canvas {
                border: 1px solid #ccc;
                border-radius: 0.5rem;
                width: 100%;
                height: 400px;
            }
        </style>
    </head>
    
    <body>
    
        <div class="container">
                <div class="card-body">
                    <!-- canvas tanda tangan  -->
                    <canvas id="signature-pad" class="signature-pad"></canvas>
    
                    <!-- tombol submit  -->
                    <div style="float: left;">
                        <button id="btn-submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
    
                    <div style="float: right;">
                        <!-- tombol ganti warna  -->
                        <button type="button" class="btn btn-success" id="change-color">
                            Change Color
                        </button>
    
                        <!-- tombol undo  -->
                        <button type="button" class="btn btn-dark" id="undo">
                            <span class="fas fa-undo"></span>
                            Undo
                        </button>
    
                        <!-- tombol hapus tanda tangan  -->
                        <button type="button" class="btn btn-danger" id="clear">
                            <span class="fas fa-eraser"></span>
                            Clear
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        <script>
            // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
            document.addEventListener('DOMContentLoaded', function () {
                resizeCanvas();
            })
    
            //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }
    
    
            var canvas = document.getElementById('signature-pad');
    
            //warna dasar signaturepad
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
    
            //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
            document.getElementById('clear').addEventListener('click', function () {
                signaturePad.clear();
            });
    
            //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
            document.getElementById('undo').addEventListener('click', function () {
                var data = signaturePad.toData();
                if (data) {
                    data.pop(); // remove the last dot or line
                    signaturePad.fromData(data);
                }
            });
    
            //saat tombol change color diklik maka akan merubah warna pena
            document.getElementById('change-color').addEventListener('click', function () {
    
                //jika warna pena biru maka buat menjadi hitam dan sebaliknya
                if(signaturePad.penColor == "rgba(0, 0, 255, 1)"){
    
                    signaturePad.penColor = "rgba(0, 0, 0, 1)";
                }else{
                    signaturePad.penColor = "rgba(0, 0, 255, 1)";
                }
            })
    
            //fungsi untuk menyimpan tanda tangan dengan metode ajax
            $(document).on('click', '#btn-submit', function () {
                var signature = signaturePad.toDataURL();
    
                $.ajax({
                    url: "proses.php",
                    data: {
                        foto: signature,
                    },
                    method: "POST",
                    success: function () {
                        location.reload();
                        alert('Tanda Tangan Berhasil Disimpan');
                    }
    
                })
            })
        </script>
    </body>
    </html>

                </td>
              </tr>
              <tr>
                <td>&nbsp;Nama</td>
                <td>:</td>
                <td>................................................</td>
              </tr>
              <tr>
                <td>&nbsp;NIP</td>
                <td>:</td>
                <td>................................................</td>
              </tr>
              <tbody>
            </table>
            <br></p>
            <p>
  <i>Keterangan</i> :*) Lingkari yang sesuai
</p>
            </tbody>
          </table>
          <input type="submit" name="btnOk" value="Cetak" class="btn btn-outline-primary"  />
          {{-- <a class="btn btn-outline-primary" title="cetak berita acara " href="/cetak_berita/{{ $nomer_ruangan }}/{{ $no_sesi }}" target="_blank" role="button"><i class="fas fa-fw fa-print"> </i></a> --}}
        </form>
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

@endsection
