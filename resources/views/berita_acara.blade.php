
@extends('template')

@section('content')
<div class="card">
    <div class="card-body">
        <img src="{{ asset('image/smk.png')}}" class="rounded mx-auto d-block" height="200" width="200" alt="...">
        <h3 class="text-center">BERITA ACARA</h3>
        <h4 class="text-center">UJIAN AKHIR SEMESTER GANJIL</h4>
        <h4 class="text-center">SMK PGRI WLINGI</h4>
        <h4 class="text-center">TAHUN PELAJARAN 2023 / 2024</h4>
        <hr><hr>
        <p>
            Pada hari ini ......................... Tanggal ...................  Bulan  Desember Tahun Dua Ribu Dua Puluh Dua. <br>
a.	Telah diselenggarakan Ujian Akhir Semester Ganjil dari pukul ...... : ...... sampai dengan ...... : ......

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
                  //table link dari absensi yang tidak hadir
                              <table border="1"rules ="all">
                                <tbody>
                              <tr>
                              <td>Baris 1 kolom 1</td>
                              <td >Baris 1 kolom 1</td>
                              <td >Baris 1 kolom 1</td>
                              </tr>
                              <tr>
                              <td>Baris 1 kolom 1</td>
                              <td>Baris 1 kolom 1</td>
                              <td>Baris 1 kolom 1</td>
                              </tr>
        
                            </tbody>
                            </table><br>
        <p>
        b. Catatan selama pelaksanaan Ujian Akhir Semester Ganjil 
        ............................................................................................................................................................................<br>
        ............................................................................................................................................................................<br>
</p>
<p>
        Berita acara ini dibuat dengan sesungguhnya.<br> 
      </p>
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
            <br><br>
            <p>
  <i>Keterangan</i> :*) Lingkari yang sesuai
</p>
            </tbody>
          </table>
    </div>
  </div>
@endsection
<script type="text/javascript">
    window.print();
    </script>
