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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kelola User</a></li>
                    <li class="breadcrumb-item active">Halaman Tambah Pengguana</li>
                </ol>
            </div>
            <h4 class="page-title">Halaman Tambah Pengguana</h4>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title" style="text-align: center; color:#000">Halaman Tambah Pengguana</h4>
                <form action="{{url('/simpan_user')}}" method="post" enctype="multipart/form-data" name="form_usr">
                  @csrf

                <div class="table-responsive-sm">
                <table class="table" style="border-color: #fff ">
                    <tbody>
                      <tr>
                        <td data-title="nama" style="width: 10%;">Nama</td>
                        <td >&nbsp;:</td>
                        <td data-title="nama" class="formulir-border" style="width: 90%; padding-left:0.8em"><input name="nama" type="text" class="form-control" id="nama_ad" placeholder="Masukan nama"></td>
                      </tr>
                      <tr>
                        <td data-title="username" style="width: 10%;">Username</td>
                        <td >&nbsp;:</td>
                        <td data-title="username" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="username" id="username_ad" placeholder="Masukan username"></td>
                      </tr>
                      <tr>
                        <td data-title="nip" style="width: 10%;">NIP</td>
                        <td >&nbsp;:</td>
                        <td data-title="nip" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="nip" id="nip_ad" placeholder="Masukan NIP"></td>
                      </tr>
                      <tr>
                        <td data-title="jabatan" style="width: 10%;">Jabatan</td>
                        <td >&nbsp;:</td>
                        <td data-title="jabatan" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="jabatan" id="jabatan_ad" placeholder="Masukan Jabatan"></td>
                      </tr>
                      <tr>
                        <td data-title="email" style="width: 10%;">Email</td>
                        <td >&nbsp;:</td>
                        <td data-title="email" class="formulir-border" style="width: 90%; padding-left:0.8em"><input type="text" class="form-control" name="email" id="email_ad" placeholder="Masukan Email"></td>
                      </tr>
                      
                      <tr>
                        <td data-title="role" style="width: 10%;">Posisi</td>
                        <td >&nbsp;:</td>
                        <td data-title="role" class="formulir-border" style="width: 90%; padding-left:0.8em">
                            <select class="form-select mb-3" name="role" style="border: 1px solid rgb(161, 161, 161);">
                                <option>--pilih posisi--</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="kepala">Kepala</option>
                                <option value="anggota">Anggota</option>
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td data-title="sanksi" style="width: 10%;">Password</td>
                        <td >&nbsp;:</td>
                        <td data-title="sanksi" class="formulir-border" style="width: 90%; padding-left:0.8em">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukan password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            <span class="alertt" style='color: red;'></span>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 10%;"></td>
                        <td >&nbsp;</td>
                        <td class="formulir-border" style="width: 90%; padding-left:0.8em"><button type="submit" class="btn btn-success">Simpan</button></td>
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
@if ($message = Session::get('fail'))
    toastr.warning("{{ $message }}","Peringatan !!", {
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
          $("form[name='form_usr']").validate({
            rules: {
              username: "required",
              nama: "required",
              nip: "required",
              jabatan: "required",
              email: "required",
              role: "required",
              
            },
            messages: {
              username: "<span style='color: red;'>Username tidak boleh kosong</span>",
              nama: "<span style='color: red;'>Nama tidak boleh kosong</span>",
              nip: "<span style='color: red;'>NIP tidak boleh kosong</span>",
              jabatan: "<span style='color: red;'>Jabatan tidak boleh kosong</span>",
              email: "<span style='color: red;'>Email tidak boleh kosong</span>",
              role: "<span style='color: red;'>Posisi tidak boleh kosong</span>",
              
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
    });

   $(document).ready(function(){
        $("form[name='form_usr']").submit(function(){
            var pass = $('#password').val().length;
            if(pass == 0){
                $('.alertt').text("Password tidak boleh kosong");
                return false;
            } 
        });
    });

    $('#password').keyup(function(){
        var texthit6 = $(this).val().length;
        if(texthit6 > 0 && texthit6 <= 6) {
            $('.alertt').text("Password minimal harus 6 karakter");
            
        } else if(texthit6 > 0 && texthit6 >= 6 ){
            $('.alertt').css('display', 'none');
        }
    
  });
</script>

@endsection