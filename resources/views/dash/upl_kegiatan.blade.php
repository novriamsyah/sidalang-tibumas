@extends('template.master')
@section('css')
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>
  
  .file-input__input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  
  .file-input__label {
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    font-size: 14px;
    padding: 10px 12px;
    background-color: #4245a8;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
  }
  
  .file-input__label svg {
    height: 16px;
    margin-right: 4px;
  }
</style>
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript: void(0);">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Upload Laporan kegiatan</li>
                    </ol>
                </div>
                <h4 class="page-title">Upload Laporan kegiatan</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  
                    <h4 class="header-title m-t-0">Upload Laporan kegiatan</h4>
                    <p class="text-muted font-14">

                    
                    <div class="tab-content">
                        <div class="tab-pane show active" id="file-upload-preview">
                            <form name="form_upload" action="{{url('/simpan_laporan')}}" method="post" enctype="multipart/form-data" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                {{-- <div class="fallback">
                                    <input name="file" type="file">
                                </div> --}}
                                @csrf

                                <input name="petugas" type="hidden" value="{{auth()->user()->nama}}">
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Pilih file dari perangkat.</h3>
                                    {{-- <span style="display:block; color:red;" >Pastikan nama berkas dari perangkat anda rapi dan tidak menggunakan unik karakter, mohon rename jika belum rapi</span> --}}
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="file-input">
                                    <input
                                      type="file"
                                      name="file_kegiatan"
                                      id="file-input"
                                      class="file-input__input"
                                      accept=".doc,.pdf,.docx"
                                    />
                                    <label class="file-input__label" for="file-input">
                                      <svg
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fas"
                                        data-icon="upload"
                                        class="svg-inline--fa fa-upload fa-w-16"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                      >
                                        <path
                                          fill="currentColor"
                                          d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                                        ></path>
                                      </svg>
                                      <span>Pilih file</span></label
                                    >
                                  </div>
                                </div>
                                <div class="dz-message needsclick">
                                <p class="bor-file" style="word-break: break-word; "><span id="dokumen_lht"></span> </p>
                                </div>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                    <div class="mb-3" style="margin-top:40px">
                      {{-- <label for="example-email" class="form-label">Email</label> --}}
                      <h4 class="header-title m-t-0">Nama berkas laporan kegiatan</h4>
                      <input type="text" id="nf_laporan" name="nama_file" class="form-control" placeholder="Nama berkas Laporan" style="border: 1px solid rgb(161, 161, 161);">
                      <span class="nm_berkas" style='color: red;'></span>
                    </div>

                    <button onclick="alertConfirmation()" type="button" class="btn btn-danger" style="margin-top: 15px">Simpan</button>
                </div>
            </form>
                <!-- end card-body -->
            </div>
            <!-- end card-->
        </div>
        <!-- end col-->
    </div>
    <!-- end row -->

@endsection
@section('script')
    {{-- <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script> --}}
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
   ></script>
    <script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/js/sweetalert.init.js')}}"></script>
    <script>
        $(function(){
            $('input[name=file_kegiatan]').change(function(){
                 $('#dokumen_lht').html("File yang anda upload: "+$(this).val());
            });
        });

        $(function() {
          $("form[name='form_upload']").validate({
            rules: {
              file_kegiatan: "required",
              nama_file: "required",
              
            },
            messages: {
              file_kegiatan: "<span style='color: red;'>File tidak boleh kosong</span>",
            },
            submitHandler: function(form) {
              form.submit();
            }
          });
    });

    $(document).ready(function(){
        $("form[name='form_upload']").submit(function(){
            var pass = $('#nf_laporan').val().length;
            if(pass == 0){
                $('.nm_berkas').text("Nama berkas tidak boleh kosong");
                return false;
            } 
        });
    });

    $('#nf_laporan').keyup(function(){
          var texthit6 = $(this).val().length;
          if(texthit6 > 0) {
              $('.nm_berkas').css('display', 'none');
          } 
      
    });


    function alertConfirmation() {
        swal({
        title: "Apakah kamu yakin ?",
        text: "Data ini akan diupload, periksa kembali jika ragu !!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, Upload!",
        cancelButtonText: "Batal",
        reverseButtons: !0
        }).then(function (e) {
        if (e.value === true) {
          $('.dropzone').submit();
          return true;
        } else {
            e.dismiss;
        }
    }, function (dismiss) {
    return false;
    })
    }
    
    </script>
@endsection