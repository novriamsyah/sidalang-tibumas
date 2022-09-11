@extends('template.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
   <style>
        tbody tr td {
            color: #000;
        }
        .formulir-border input {
            border: 1px solid rgb(161, 161, 161);
        }
        .new-button3 {
        display: inline-block;
        padding: 8px 12px; 
        cursor: pointer;
        border-radius: 4px;
        background-color: #3a64f0;
        font-size: 16px;
        color: #fff;
        }
        input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 6px;
        left: 0;
        font-size: 15px;
        color: rgb(153,153,153);
      }
        

   </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Input Tindakan Pelanggaran</li>
                </ol>
            </div>
            <h4 class="page-title">Input Tindakan Pelanggaran</h4>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title" style="text-align: center; color:#000">Formulir Tindak Pelanggaran</h4>
                <form action="{{url('/proses_tindak_pelanggaran')}}" method="post" enctype="multipart/form-data" name="form_plgrn">
                  @csrf

                  <input name="petugas" type="hidden" value="{{auth()->user()->nama}}">

                <div class="table-responsive-sm">
                <table class="table" style="border-color: #fff ">
                    <tbody>
                      <tr>
                        <td data-title="nama" style="width: 10%;">Nama</td>
                        <td >&nbsp;:</td>
                        <td data-title="nama" class="formulir-border" style="width: 90%; padding-left:0.8em"><input name="nama" type="text" class="form-control" id="nama_ad" placeholder="Masukan nama"></td>
                      </tr>
                      <tr style="line-height: 1">
                        <td data-title="alamat" style="width: 10%;">Alamat</td>
                        <td >&nbsp;:</td>
                        <td data-title="alamat" class="formulir-border" style="width: 90%; padding-left:0.8em"><textarea name="alamat" data-toggle="maxlength" class="form-control" maxlength="225" rows="3" 
                        placeholder="Masukan alamat" style="border: 1px solid rgb(161, 161, 161);"></textarea></td>
                      </tr>
                      <tr>
                        <td data-title="nik" style="width: 10%;">No. Kartu Identitas</td>
                        <td >&nbsp;:</td>
                        <td data-title="nama" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="nik" id="nik_ad" placeholder="Nomor KTP">
                          <span id="error-nik" style="display: none; color:red"></span>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="nik" style="width: 10%;"></td>
                        <td >&nbsp;</td>
                        <td data-title="nama" class="formulir-border" style="width: 90%; padding-left:0.8em">
                            {{-- <input type="file" class="form-control" name="fl_nik" id="nik_ad"> --}}
                            <div style="position: relative">
                              <label for="formFile3" class="new-button3">Upload KTP</label>
                              <input class="form-control" type="file" id="formFile3" name="fl_nik" accept=".jpg, .jpeg, .png">
                              <p style="word-break: break-word; border-bottom:1px solid rgb(161, 161, 161); width:100% "><span id="pendukung_lht"></span> </p>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="pekerjaan" style="width: 10%;">Pekerjaan</td>
                        <td >&nbsp;:</td>
                        <td data-title="pekerjaan" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="pekeerjaan" id="pekerjaan_ad" placeholder="Masukan pekerjaan"></td>
                      </tr>
                      <tr>
                        <td data-title="nohp" style="width: 10%;">No. Handphone</td>
                        <td >&nbsp;:</td>
                        <td data-title="nohp" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="nohp" id="nohp_ad" placeholder="Masukan nomor hp">
                          <span id="error-nohp" style="display: none; color:red"></span>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="jns_pelanggaran" style="width: 10%;">Jenis Pelanggaran</td>
                        <td >&nbsp;:</td>
                        <td data-title="jns_pelanggaran" class="formulir-border" style="width: 90%; padding-left:0.8em">
                          <select class="form-select mb-3" name="jns_pelanggaran" style="border: 1px solid rgb(161, 161, 161);">
                          <option>---Pilih Jenis Pelanggran---</option>
                          <option value="Pelanggaran Perda/Perkada">Pelanggaran Perda/Perkada</option>
                          <option value="Gangguan Trantibum">Gangguan Trantibum</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="lks_pelanggaran" style="width: 10%;">Lokasi Pelanggaran</td>
                        <td >&nbsp;:</td>
                        <td data-title="lks_pelanggaran" class="formulir-border" style="width: 90%; padding-left:0.8em">
                        <textarea name="lks_pelanggaran" data-toggle="maxlength" class="form-control" maxlength="225" rows="3" 
                        placeholder="Masukan Lokasi Pelanggaran" style="border: 1px solid rgb(161, 161, 161);"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="lokasi" style="width: 10%;"></td>
                        <td >&nbsp;</td>
                        <td data-title="lokasi" class="formulir-border" style="width: 90%; padding-left:0.8em">
                            <div class="row">
                              <div class="col-4">
                                  {{-- <select class="form-select mb-3">
                                      <option selected value="Pangkalpinang">Pangkalpinang</option>
                                  </select> --}}
                                  <input type="text" value="Pangkalpinang" class="form-control" readonly>
                              </div>
                                <div class="col-4">
                                    <select class="form-select mb-3" id="kecamatan" name="kecamatan" style="border: 1px solid rgb(161, 161, 161);">
                                        <option disabled selected value="">---Pilih Kecamatan---</option>
                                        @foreach ($kecamatan as $kc)
                                        <option value="{{$kc->kecamatan}}" idAmbil="{{$kc->id}}" style="color:#000">{{$kc->kecamatan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                  <select class="form-select mb-3" id="kelurahan" name="kelurahan" style="border: 1px solid rgb(161, 161, 161);">
                                      <option>---Pilih Kelurahan---</option>
                                  </select>
                              </div>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="sanksi" style="width: 10%;">Sanksi</td>
                        <td >&nbsp;:</td>
                        <td data-title="sanksi" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="sanksi" id="sanksi_ad" placeholder="Masukan sanksi"></td>
                      </tr>
                      <tr>
                        <td data-title="desk_pelanggaran" style="width: 10%;">Deskripsi Pelanggaran</td>
                        <td >&nbsp;:</td>
                        <td class="formulir-border" style="width: 90%; padding-left:0.8em">
                          <textarea name="desk_pelanggaran" id="ckeditor" cols="30" rows="10" class="isi"></textarea>                      
                      </td>
                      </tr>
                      <tr>
                        <td style="width: 10%;"></td>
                        <td >&nbsp;</td>
                        <td class="formulir-border" style="width: 90%; padding-left:0.8em"><button type="submit" class="btn btn-success">Kirim formulir</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('script')
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"
></script>
<script src="{{ asset('assets/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.form-validator.min.js') }}"></script>

<script>
    tinymce.init({
        selector: 'textarea.isi',
        menubar: 'edit view insert format tools table help',
    });
</script>
<script>
  $(function(){
    $('input[name=fl_nik]').change(function(){
      $('#pendukung_lht').html("File yang diupload : " + $(this).val()  );
    });
  });

  $('#nik_ad').keyup(function(){
    this.value = this.value.replace(/[^0-9\.]/g,'');
    var texthit1 = $(this).val().length;
    if(texthit1 == 0) {
      $('#error-nik').hide();
    } else if(texthit1 > 0 && texthit1 <= 15) {
      $('#error-nik').text("NIK minimal 16 karakter angka").show();
    } else {
      $('#error-nik').hide();
    }
  });
  $('#nohp_ad').keyup(function(){
    this.value = this.value.replace(/[^0-9\.]/g,'');
    var texthit3 = $(this).val().length;
    if(texthit3 == 0) {
      $('#error-nohp').hide();
    } else if(texthit3 <= 8) {
      $('#error-nohp').text("Nomor telpon minimal 9 karakter angka").show();
    } else {
      $('#error-nohp').hide();
    }
  });

  $(function() {
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
  });
    $(function() {
      $('#kecamatan').on('change', function() {
        // let id_pemohon = $('#pemohon').val();
        let ambilId = $('option:selected', this).attr('idAmbil');
        $.ajax({
          type: 'POST',
          url: "{{url('getkelurahan')}}",
          data: {ambilId: ambilId},
          cahce: false,
          success: function(msg) {
            $('#kelurahan').html(msg);
          },
          error: function(data){
            console.log('error', data);
          },
        });
      });
    });

  @if ($message = Session::get('gagal'))
    toastr.warning("{{ $message }}","Peringatan !", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-top-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
    @endif
    $(function() {
          $("form[name='form_plgrn']").validate({
            rules: {
              username: "required",
              nama: "required",
              nik: "required",
              fl_nik: "required",
              pekeerjaan: "required",
              nohp: "required",
              jns_pelanggaran: "required",
              lks_pelanggaran: "required",
              kelurahan: "required",
              kecamatan: "required",
              sanksi: "required",
              alamat: "required",
              desk_pelanggaran: "required",
            },
            messages: {
              username: "<span style='color: red;'>Username tidak boleh kosong</span>",
              nama: "<span style='color: red;'>Nama tidak boleh kosong</span>",
              nik: "<span style='color: red;'>Nomor KTP tidak boleh kosong</span>",
              fl_nik: "<span style='color: red;'>file KTP tidak boleh kosong</span>",
              pekeerjaan: "<span style='color: red;'>Pekerjaan tidak boleh kosong</span>",
              nohp: "<span style='color: red;'>Nomor HP tidak boleh kosong</span>",
              jns_pelanggaran: "<span style='color: red;'>Jenis pelanggaran tidak boleh kosong</span>",
              lks_pelanggaran: "<span style='color: red;'>Lokasi pelanggaran tidak boleh kosong</span>",
              kelurahan: "<span style='color: red;'>Kelurahan tidak boleh kosong</span>",
              kecamatan: "<span style='color: red;'>Kecamatan tidak boleh kosong</span>",
              sanksi: "<span style='color: red;'>Sanksi tidak boleh kosong</span>",
              alamat: "<span style='color: red;'>Alamat tidak boleh kosong</span>",
              desk_pelanggaran: "<span style='color: red;'>Deskripsi pelanggaran tidak boleh kosong</span>",
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
    });
</script>

@endsection