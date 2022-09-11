<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SIDALANG-TIBUMAS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
       

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            
                            <div class="card-body p-4">

                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold" style="color: #000000;">Reset Password</h4>
                                    <p class="text-muted mb-4">Masukan alamat Email dan kami akan mengirimkan intruksi dalam mereset password pada email tersebut.</p>
                                </div>

                                <form action="{{route('forget.password.post')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label" style="color: #000000;">Alamat Email</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Masukan email" style="border:1px solid #000000">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">Masukan Email yang valid</span>
                                        @endif
                                    </div>

                                    <div class="mb-0 text-center">
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </div>
                                </form>
                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p style="color: #000000;">Back to <a href="{{route('login')}}" class="ms-1" style="color: #060af7;"><b>Log In</b></a></p>
                                    </div> <!-- end col -->
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card -->

                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- bundle -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        
    </body>
</html>
