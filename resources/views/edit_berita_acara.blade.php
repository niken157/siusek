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
$awal =substr($sesi->jam_awal, 0, 5);
$akhir =substr($sesi->jam_berakhir, 0, 5);
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
        <style>
            .kbw-signature { width: 100%; height: 200px;}
            #sig canvas{
                width: 100% !important;
                height: auto;
            }
        </style>
 <form method="post" action="/berita/update">
            {{ csrf_field() }}
        <img src="/image/{{ $setting->logo}}" class="rounded mx-auto d-block" height="100" width="100" alt="...">
        <h4 class="text-center"><b>BERITA ACARA</b></h4>
        <h6 class="text-center upper">{{ $setting->nama_ujian}}</h6>
        <h6 class="text-center">SMK PGRI WLINGI</h6>
        <h6 class="text-center">TAHUN PELAJARAN {{ $setting->tahun_ajaran}}</h6>
       <hr class="border border-dark opacity-75">
        <p>
            Pada hari ini
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="hari" value="{{ $tabel_berita_acara->hari }}" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
            </div>
               Tanggal
               <div class="input-group mb-3">
                <input type="date" class="form-control" name="tanggal" value="{{ $tabel_berita_acara->tanggal }}" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
              </div>
              <br>
a.	Telah diselenggarakan {{ $setting->nama_ujian}} dari pukul {{ $awal}} sampai dengan {{ $akhir}}
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
                <td>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="hadir" value="{{ $tabel_berita_acara->hadir }}" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <span class="input-group-text" id="basic-addon2">Orang</span>
                      </div>
                </td>
              </tr>
              <tr>
                <td>Yang tidak hadir</td>
                <td>:</td>
                <td><div class="input-group mb-3">
                    <input type="number" class="form-control" name="tdk_hadir" value="{{ $tabel_berita_acara->tdk_hadir }}" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                    <span class="input-group-text" id="basic-addon2">Orang</span>
                  </div>, yakni :</td>
              </tr>
              <tr>
                <td>
                    <div class="mb-3">
                        <label for="tdk_masuk">Nama Peserta Didik Yang Tidak Hadir :</label>
                        <select name="nama[]" class="selectpicker  form-control" data-live-search="true" multiple placeholder="Pilih Peserta" id="multiple-select-field">
                            <option value="-">Tidak Ada</option>
                            @php
                                $peserta = DB::table('peserta')->get();
                            @endphp
                        @foreach($peserta as $p)
                        <option value="{{ $p->nama_peserta }}({{ $p->kelas }})">{{ $p->nama_peserta }}({{ $p->kelas }})</option>
                        @endforeach
                        </select>
                    </div>
                </td>
              </tr>
                            </tbody>
                            </table>
        <p>
        b. Catatan selama pelaksanaan {{ $setting->nama_ujian}} <br>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Catatan:</label>
            <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $tabel_berita_acara->catatan }}</textarea>
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
                      {{-- <iframe src="/signaturepad" height="341px" width="800px"></iframe> --}}
                      <div class="card">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                            <div class="col-md-12">
                                <label class="" for="">Tanda Tangan:</label>
                                <br/>
                                <div id="sig" ></div>
                                <br/>
                                <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                            </div>

               </div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;Nama</td>
                <td>:</td>
                <td>
                    <div class="input-group mb-3">
                        <input type="text" value="{{ $tabel_berita_acara->pengawas }}" class="form-control" name="pengawas" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                      </div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;NIP</td>
                <td>:</td>
                <td>
                    <div class="input-group mb-3">
                        <input type="text" value="{{ $tabel_berita_acara->nip }}" class="form-control" name="nip" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                      </div>
                </td>
              </tr>
              <tbody>
            </table>
            <br></p>
            <p>
  <i>Keterangan</i> :*) Pilih "Tidak Ada" Jika Peserta Semua Hadir Dan <b>WAJIB</b> Mengisi Tanda Tangan
</p>
            </tbody>
          </table>
          <input type="hidden" name="nama_ruangan" value="{{ $nama_ruangan}}">
        <input type="hidden" name="nama_sesi" value="{{ $nama_sesi}}">

          <input type="hidden" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d h:i:s'); ?>">
          <input type="submit" name="btnOk" value="Ubah Riwayat" class="btn btn-outline-primary"  />
          {{-- <a class="btn btn-outline-primary" title="cetak berita acara " href="/cetak_berita/{{ $nama_ruangan }}/{{ $nama_sesi }}" target="_blank" role="button"><i class="fas fa-fw fa-print"> </i></a> --}}
        </form>

    </div>

  </div>
  <script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>
@endsection

