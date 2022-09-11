@extends('template.master')
@section('css')
<link rel="stylesheet" href="https:////cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="{{asset('assets/vendor/toastr/css/toastr.min.css')}}">
<link href="{{ asset('assets/vendor/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
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
    <div class="col-xxl-4 col-lg-4">
        <div class="card widget-flat bg-primary text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-text-box-multiple mdi-48px"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Total Tindakan Pelanggaran</h6>
                <h2 class="mt-3 mb-3">{{$count_1}}</h2>
                <p class="mb-0">
                </p>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-lg-4">
        <div class="card widget-flat bg-warning text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-folder-open mdi-48px"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Total Laporan Kegiatan</h6>
                <h2 class="mt-3 mb-3">{{$count_2}}</h2>
                <p class="mb-0">
                </p>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-lg-4">
        <div class="card widget-flat bg-success text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple mdi-48px"></i>
                    {{-- <i class='uil uil-users-alt float-end'></i> --}}
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Total User</h6>
                <h2 class="mt-3 mb-3">{{$count_3}}</h2>
                <p class="mb-0">
                </p>
            </div>
        </div>
    </div>
</div>   
<div class="row" style="margin-top: 40px">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 style="color: #000000">Form Tidakan Pelanggaran</h4>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="striped-rows-preview">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0" id="myTable3">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal / Hari</th>
                                        <th>Nama Pelanggar</th>
                                        <th>Lokasi Pelanggaran</th>
                                        <th>Petugas</th>
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
                                        <td>{{$dt->lks_pelanggaran}} kel. {{$dt->kelurahan}} Kec. {{$dt->kecamatan}} Pangkalpinang</td>
                                        <td>{{$dt->petugas}}</td>
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
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('assets/vendor/sweetalert/js/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function () {
       $("#myTable3").DataTable({
         pageLength: 7,
         lengthMenu: [7,10,15],
       });
     });
</script>
<script type="text/javascript">
    @if ($message = Session::get('berhasil_login'))
    toastr.success("{{ $message }}","Selamat !", {
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
</script>
@endsection
