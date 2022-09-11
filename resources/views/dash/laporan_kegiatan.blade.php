@extends('template.master')
@section('css')
<link rel="stylesheet" href="https:////cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>
    thead tr th {
        color:#000000;
        font-weight: bold;
    }
    tbody tr td {
        color:#000000;
    }
</style>
@endsection
@section('content')
@if (auth()->user()->role == "super_admin" || auth()->user()->role == "anggota")
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Kegiatan</li>
                </ol>
            </div>
            <h4 class="page-title" style="color: #000000">Laporan Kegiatan</h4>
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="margin-top: 20px; margin-bottom:8px">
                <a href="{{url('/upload_kegiatan')}}" class="btn btn-success" role="button"><i class="mdi mdi-plus "></i> Upload Kegiatan</a>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Laporan Kegiatan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php $num = 1 ?>
                                    @foreach ($datas as $dt)
                                    <tr>
                                        <td style="width: 10%">{{$num}}.</td>
                                        <td style="word-break:break-word; width:70%">{{$dt->nama_file}}</td>
                                        <td class="table-action" style="width: 20%">
                                            <a href="#" class="action-icon"><button type="button" class="btn btn-dark lihat_pdf" data-bs-toggle="modal" data-bs-target="#full-width-modal" data-lihat="{{$dt->id}}" style="display: inline-block; margin-top:8px"><i class="dripicons-preview"></i></button></a>
                                            <a href="{{url('/unduh_laporan_kegiatan/'.$dt->id)}}" class="action-icon"><button type="button" class="btn btn-primary" style="display: inline-block; margin-top:8px"><i class="dripicons-download"></i></button></a>
                                            <a class="action-icon delete-confirm"><button onclick="deleteConfirmation({{$dt->id}})" type="button" class="btn btn-danger" style="display: inline-block; margin-top:8px"><i class="dripicons-trash"></i></button></a>  
                                        </td>
                                    </tr>
                                    <?php $num++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->                     
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Laporan Kegiatan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe class="lihat_dokumen"  width="100%" height="900" frameborder="0"></iframe>
                {{-- <iframe src="{{asset('/laporan_file/bismillah_rev.pdf')}}" width="100%" height="900" frameborder="0"></iframe> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@else
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Kegiatan</li>
                </ol>
            </div>
           
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="margin-top: 20px; margin-bottom:8px">
                {{-- <a href="{{url('/upload_kegiatan')}}" class="btn btn-success" role="button"><i class="mdi mdi-plus "></i> Upload Kegiatan</a> --}}
                <h4 class="page-title" style="color: #000000">Laporan Kegiatan</h4>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Laporan Kegiatan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php $num = 1 ?>
                                    @foreach ($datas as $dt)
                                    <tr>
                                        <td style="width: 10%">{{$num}}.</td>
                                        <td style="word-break:break-word; width:70%">{{$dt->nama_file}}</td>
                                        <td class="table-action" style="width: 20%">
                                            <a href="#" class="action-icon"><button type="button" class="btn btn-dark lihat_pdf" style="display: inline-block; margin-top:8px" disabled><i class="dripicons-preview"></i></button></a>
                                            <a href="" class="action-icon"><button type="button" class="btn btn-primary" style="display: inline-block; margin-top:8px" disabled><i class="dripicons-download"></i></button></a>
                                            <a class="action-icon delete-confirm"><button type="button" class="btn btn-danger" style="display: inline-block; margin-top:8px" disabled><i class="dripicons-trash"></i></button></a>  
                                        </td>
                                    </tr>
                                    <?php $num++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->                     
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Laporan Kegiatan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe class="lihat_dokumen"  width="100%" height="900" frameborder="0"></iframe>
                {{-- <iframe src="{{asset('/laporan_file/bismillah_rev.pdf')}}" width="100%" height="900" frameborder="0"></iframe> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif
@endsection
@section('script')
 {{-- <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script> --}}
 <script
 src="https://code.jquery.com/jquery-3.6.0.min.js"
 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
 crossorigin="anonymous"
></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert.init.js')}}"></script>
<script>
     $(document).ready(function () {
        $("#myTable").DataTable({
          pageLength: 7,
          lengthMenu: [7,10,15],
        });
      });
</script>
<script>
     @if ($message = Session::get('berhasil'))
    toastr.success("{{ $message }}","Selamat", {
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
    function deleteConfirmation(id) {
        swal({
        title: "Apakah kamu yakin?",
        text: "Data ini akan dihapus permanen !!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        reverseButtons: !0
        }).then(function (e) {
        if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        type: 'POST',
        url: "{{url('/hapus_laporan_kegiatan')}}/" + id,
        data: {_token: CSRF_TOKEN},
        dataType: 'JSON',
        success: function (results) {
            if (results.success === true) { 
                swal("Done!", results.message, "success");
            } else {
                swal("Error!", results.message, "error");
        }
        }
        });
            location.reload();
        } else {
            e.dismiss;
        }
    }, function (dismiss) {
    return false;
    })
    }

    $(document).on('click', '.lihat_pdf', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-lihat');
        $.ajax({
            url: "{{ url('/lihat_dokumen') }}/" + id,
            method: "GET",
            success:function(response) {
            //   console.log(response);
            var linkUrl = encodeURIComponent(response.file_kegiatan);
              var lihat =  $('.lihat_dokumen').attr('src', "http://docs.google.com/gview?url={{asset('/laporan_file')}}/"+linkUrl+"&embedded=true");

            }
        })
    });
</script>
@endsection