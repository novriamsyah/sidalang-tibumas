<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      body{
        margin: 0;
        padding: 0;
        font-family: "Times New Roman", serif;
        color: #000000;
      }
      .table tr td {
        font-size: 14px;
        color:#000000;
      }
    </style>

    <title>Cetak PDF Tindakan Pelanggaran</title>
  </head>
  <body>
    @php
        $tgl = \Carbon\Carbon::now()->translatedFormat('d F Y');
    @endphp
    <div class="kerangka" style="width:100%; margin-left:30px; margin-top:-20px">
      <div class="bungkus-isi" >
          <table class="table">
            <tr>
              <td style="width:20%;padding-left:45px">
                <img src="https://user-images.githubusercontent.com/52773931/189068363-19d340bc-416a-4d07-9b1a-400404cd39c4.png" style="width: 95px; height:110px;">
              </td>
              <td style="width:55%;">
                <div class="header-kop" style="line-height: 0.5; margin-top:40px">
                  <p style=" font-size:16px; text-align:center">PEMERINTAH KOTA PANGKALPINANG</p>
                </div>
                <div class="hader-kop-2" style="line-height: 0.5;">
                  <p style="font-size: 22px; text-align:center; font-weight:bold">SATUAN POLISI PAMONG PRAJA</p>
                </div>
                <div class="hader-kop-3" style="line-height: 0.5;">
                  <p style="font-size: 14px; text-align:center">Jalan Rasa Kunda Kecamatan Girimaya Pangkalpinang</p>
                </div>
              </td>
              <td style="width:25%;">
                <img src="https://user-images.githubusercontent.com/52773931/189069306-4ef7f70a-d2f2-4f60-83a8-8332f0b85bb8.png" style="width: 85px; height:110px;">
              </td>
            </tr>
          </table>
          <div style="border-bottom: 4px solid rgb(59, 59, 59); margin-top:20px; margin-left:20px; width:630px"></div>
          <div class="isi-surat-atas" style="margin-top: 30px; text-align:center; line-height:0.2">
            <p style="font-size: 15px; font-weight:bold">
              FORMULIR TINDAKAN PELANGGARAN
            </p>
          </div>
      </div>
    </div>
      <div class="table-responsive" style="margin-left: 45px">
        <table class="table">
          <tbody>
                @php
                $tgl = Carbon\Carbon::now()->translatedFormat('d F Y');
              @endphp
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Nama</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->nama}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Alamat</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->alamat}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">No. Kartu Identitas</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->nik}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Pekerjaan</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->pekeerjaan}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">No.Handphone</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->nohp}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Jenis Pelanggaran</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->jns_pelanggaran}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Lokasi Pelanggaran</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->lks_pelanggaran}} Kel. {{$doc_lihat->kelurahan}} Kec. {{$doc_lihat->kecamatan}} Pangkalpinang</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Sanksi</td>
              <td data-title="noreg">&nbsp;:</td>
              <td data-title="Code" style="width: 70%; font-size:14px; padding-left:0.8em">{{$doc_lihat->sanksi}}</td>
            </tr>
            <tr style="line-height: 2">
              <td data-title="noreg" style="width: 30%; font-size:14px">Deskripsi Pelanggaran</td>
              <td data-title="noreg">&nbsp;:</td>
            </tr>
          </tbody>
        </table>
        <table class="table">
          <tbody>
            <tr>
              <td data-title="Code" style="width: 100%; font-size:14px; padding-right:1em; text-align:justify; ">
                <div style="border: 0.1px solid rgb(100, 100, 100); height:230px; overflow:hidden; padding: 0em 0.4em 0.4em 0.4em">
                  {!!$doc_lihat->desk_pelanggaran!!}
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <table class="table" style="width:100%; margin-top:60px;">
        <tbody>
          <tr>
            <td style="width: 40%; padding-left:50px">
              <span style="font-size:14px;">
                Mengetahui,
              </span>
              <span style="display:block;font-size:14px;">
                Kepala Satuan Polisi Pamong Praja
              </span>
              <span style="display:block;font-size:14px; margin-left:40px">
                Kota Pangkalpinang
              </span>
              <br><br><br><br>
              <span style="font-size:14px;">
               Efran S.STP.,M.Tr.IP
              </span>
              <span style="display:block;font-size:14px;">
                Pembina Tk.1 / IV B
               </span>
               <span style="display:block;font-size:14px;">
                NIP. 198207072001121005
               </span>
            </td>
            <td style="width: 30%;">

            </td>
            <td style="width: 30%; padding-left:30px">
              <span style="font-size:14px; margin-left:-20px">
                Pangkalpinang, {{$tgl}} 
              </span>
              <span style="font-size:14px; display:block; margin-left:-20px">
                PETUGAS OPERASI
              </span>
              <br><br><br><br><br>
              <span style="font-size:14px; margin-left:-20px">
                {{$dt_petugas->nama}}
               </span>
                <span style="display:block;font-size:14px; margin-left:-20px">
                 NIP. {{$dt_petugas->nip}}
                </span>
            </td>
          </tr>
        </tbody>
      </table>

    
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>