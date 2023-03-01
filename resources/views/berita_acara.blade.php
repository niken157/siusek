@extends('template')

@section('content')
<div class="card">
    <div class="card-body">
        <img src="{{ asset('image/smk.png')}}" class="rounded mx-auto d-block" height="100" width="100" alt="...">
        <h4 class="text-center"><b>BERITA ACARA</b></h4>
        <h6 class="text-center">UJIAN AKHIR SEMESTER GANJIL</h6>
        <h6 class="text-center">SMK PGRI WLINGI</h6>
        <h6 class="text-center">TAHUN PELAJARAN 2023 / 2024</h6>
       <hr size="10px" color="black" size = “2” width = “80%”>
        <p>
            Pada hari ini ............... Tanggal .................  Bulan  Desember Tahun Dua Ribu Dua Puluh Dua. <br>
a.	Telah diselenggarakan Ujian Akhir Semester Ganjil dari pukul ...... : ...... sampai dengan .... : ....
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
                              <table class="table"style="border: 1px solid black;">
                                <tbody>
                              <tr>
                              <td style="border: 1px solid black;"><b>NO</b></td>
                              <td style="border: 1px solid black;"><b>NAMA</b></td>
                              <td style="border: 1px solid black;"><b>KELAS</b></td>
                              <td style="border: 1px solid black;"></td>
                              <td style="border: 1px solid black;"><b>NO</b></td>
                              <td style="border: 1px solid black;"><b>NAMA<b></td>
                              <td style="border: 1px solid black;"><b>KELAS</b></td>
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"><b> 1</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"><b>5</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"> <b>2</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"><b>6 </b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"> <b>3</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"><b> 7</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                              
                              </tr>
                              <tr style="border: 1px solid black;">
                              <td style="border: 1px solid black;"> <b>4</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"><b> 8</b></td>
                              <td style="border: 1px solid black;"> </td>
                              <td style="border: 1px solid black;"> </td>
                              </tr>
                            </tbody>
                            </table>
        <p>
        b. Catatan selama pelaksanaan Ujian Akhir Semester Ganjil 
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
            <br><br></p>
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
