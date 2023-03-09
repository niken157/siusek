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
        <style>
        body { background-color: #fafafa; }
            #myCanvas {
                border:4px solid #444;
                border-radius: 15px;
                background-color: #fafafa;
            }
            .container { margin: 150px auto; }
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
                        <input type="number" class="form-control" name="jumlah_hadir[]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">Orang</span>
                      </div>
                </td>
              </tr>
              <tr>
                <td>Yang tidak hadir</td>
                <td>:</td>
                <td><div class="input-group mb-3">
                    <input type="number" class="form-control" name="tdk_hadir[]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Orang</span>
                  </div>, yakni :</td>
              </tr>
              <tr>
                <td>
                    <div class="mb-3">
                        <label for="tdk_masuk">Nama Peserta Didik Yang Tidak Hadir :</label>
                        <select name="tdk_masuk[]" class="selectpicker  form-control" data-live-search="true" multiple placeholder="Pilih Peserta" id="multiple-select-field">
                            <option name="tdk_masuk[]" value="-">Tidak Ada</option>
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
                    {{-- <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="/signaturepad" allowfullscreen></iframe>
                      </div> --}}
                      <iframe src="/signaturepad" height="341px" width="800px"></iframe>
                </td>
              </tr>
              <tr>
                <td>&nbsp;Nama</td>
                <td>:</td>
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_pengawas[]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      </div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;NIP</td>
                <td>:</td>
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nip_pengawas[]" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      </div>
                </td>
              </tr>
              <tbody>
            </table>
            <br></p>
            <p>
  <i>Keterangan</i> :*) Pilih Tidak Ada Jika Peserta Semua Hadir
</p>
            </tbody>
          </table>
          <input type="submit" name="btnOk" value="Cetak" class="btn btn-outline-primary"  />
          {{-- <a class="btn btn-outline-primary" title="cetak berita acara " href="/cetak_berita/{{ $nomer_ruangan }}/{{ $no_sesi }}" target="_blank" role="button"><i class="fas fa-fw fa-print"> </i></a> --}}
        </form>

    </div>

  </div>
@endsection

