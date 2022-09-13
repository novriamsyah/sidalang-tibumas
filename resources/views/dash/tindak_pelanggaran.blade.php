@extends('template.master')
@section('css')
<!-- Datatables css -->
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
                    <li class="breadcrumb-item active">Form tindakan pelanggaran</li>
                </ol>
            </div>
            <h4 class="page-title" style="color: #000000">Form tindakan pelanggaran</h4>
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="margin-top: 20px; margin-bottom:8px">
                <a href="{{url('/form_tindak_pelanggaran')}}" class="btn btn-success" role="button"><i class="mdi mdi-plus "></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0" id="myTable2">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Tanggal / Hari</th>
                                        <th scope="col">Nama Pelanggar</th>
                                        <th scope="col">Lokasi Pelanggaran</th>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Jenis Pelanggaran</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <?php $num = 1 ?>
                                    @foreach ($datas as $dt)
                                    <tr> 
                                        
                                        <td>{{$num}}.</td>
                                        <td>{!! date('d-m-Y', strtotime($dt->created_at))!!} / {{\Carbon\Carbon::parse($dt->created_at)->translatedFormat('l')}}</td>
                                        <td>{{$dt->nama}}</td>
                                        <td>{{$dt->lks_pelanggaran}}</td>
                                        <td>{{$dt->petugas}}</td>
                                        <td>{{$dt->jns_pelanggaran}}</td>
                                        <td>
                                            <a href="{{url('/pdf_tindak_pelangggaran/'.$dt->id)}}" class="action-icon" target="_BLANK"><button type="button" class="btn btn-dark btn-sm" style="display: inline-block; margin-top:8px"><i class="dripicons-print"></i></button></a>
                                            <a href="{{url('/unduh_pdf_tindak_pelangggaran/'.$dt->id)}}" class="action-icon" ><button type="button" class="btn btn-primary btn-sm" style="display: inline-block; margin-top:8px"><i class="dripicons-download"></i></button></a> 
                                            <a href="{{url('/edit_tindak_pelangggaran/'.$dt->id)}}" class="action-icon" ><button type="button" class="btn btn-warning text-white btn-sm" style="display: inline-block; margin-top:8px"><i class="dripicons-pencil"></i></button></a> 
                                            <a class="action-icon delete-confirm"><button onclick="deleteConfirmation({{$dt->id}})" type="button" class="btn btn-danger btn-sm" style="display: inline-block; margin-top:8px"><i class="dripicons-trash"></i></button></a>  
                                           
                                            {{-- <a class="dropdown-item delete-confirm" onclick="deleteConfirmation({{$dt->id}})" role="button">Delete</a> --}}
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
@else
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Form tindakan pelanggaran</li>
                </ol>
            </div>
         
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header" style="margin-top: 20px; margin-bottom:8px">
                {{-- <a href="{{url('/form_tindak_pelanggaran')}}" class="btn btn-success" role="button"><i class="mdi mdi-plus "></i> Tambah Data</a> --}}
                <h4 class="page-title" style="color: #000000">Form tindakan pelanggaran</h4>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0" id="myTable2">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Tanggal / Hari</th>
                                        <th scope="col">Nama Pelanggar</th>
                                        <th scope="col">Lokasi Pelanggaran</th>
                                        <th scope="col">Petugas</th>
                                        <th scope="col">Jenis Pelanggaran</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <?php $num = 1 ?>
                                    @foreach ($datas as $dt)
                                    <tr> 
                                        <td>{{$num}}.</td>
                                        <td>{!! date('d-m-Y', strtotime($dt->created_at))!!} / {{\Carbon\Carbon::parse($dt->created_at)->translatedFormat('l')}}</td>
                                        <td>{{$dt->nama}}</td>
                                        <td>{{$dt->lks_pelanggaran}}</td>
                                        <td>{{$dt->petugas}}</td>
                                        <td>{{$dt->jns_pelanggaran}}</td>
                                        <td>
                                            <a href="#" class="action-icon"><button type="button" class="btn btn-dark btn-sm" style="display: inline-block; margin-top:8px"><i class="dripicons-print"></i></button></a>
                                            <a href="#" class="action-icon"><button type="button" class="btn btn-primary btn-sm" style="display: inline-block; margin-top:8px"><i class="dripicons-download"></i></button></a>  
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
@endif
@endsection
@section('script')
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
        $("#myTable2").DataTable({
          pageLength: 7,
          lengthMenu: [7,10,15],
        });
      });
</script>
<script>
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
        url: "{{url('/hapus_tindak_pelangggaran')}}/" + id,
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
    @if ($message = Session::get('diubah'))
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
    @if ($message = Session::get('Gglubah'))
    toastr.warning("{{ $message }}","Peringatan", {
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
    // @if ($message = Session::get('tersimpan'))
    //     swal(
    //         "berhasil",
    //         "{{ $message }}",
    //         "success"
    //     )
    // @endif
</script>
@endsection