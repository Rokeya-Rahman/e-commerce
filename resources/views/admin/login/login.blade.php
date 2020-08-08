<!DOCTYPE html>
<html dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        {{--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/assets/images/favicon.png">--}}
        <title>Login</title>
        <!-- Custom CSS -->
        <link href="{{ asset('/') }}admin/template/dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="main-wrapper">
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background-color: rgba(136, 14, 79, .8) !important;">
                <div class="auth-box border-top border-secondary bg-light">
                    <div id="loginform">

                        <div class="text-center p-t-20 p-b-20">
                            <h4 class="msg text-center text-dark">Sign in to start your session</h4>
                        </div>

                        {{ Form::open(['route'=>'login', 'method'=>'POST']) }}

                            <div class="row p-b-30">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="User email" value="{{ Session::get('oldEmail') }}">
                                    </div>
                                    <p class="text-danger font-weight-bold">{{ Session::get('message') }}</p>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                                    </div>
                                    <p class="text-danger font-weight-bold">{{ Session::get('message1') }}</p>

                                </div>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="p-t-20">
                                            <div class="col-xs-8 p-t-5">
                                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink mt-2 mb-5">
                                                <label for="rememberme" class="text-dark ml-3 mt-2 mb-5">Remember Me</label>
                                                <button id="logBtn" class="btn btn-rounded bg-info text-white float-right" type="submit">Login</button>
                                            </div>

                                            <button class="btn btn-rounded bg-danger text-white" id="to-recover" type="button">Lost password?</button>
                                            <button class="btn btn-rounded bg-primary text-white float-right" type="button">Sing Up Now</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('/') }}admin/template/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('/') }}admin/template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ============================================================== -->
        <!-- This page plugin js -->
        <!-- ============================================================== -->
        <script>

            $('[data-toggle="tooltip"]').tooltip();
            $(".preloader").fadeOut();
            // ==============================================================
            // Login and Recover Password
            // ==============================================================
            $('#to-recover').on("click", function() {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });
            $('#to-login').click(function(){

                $("#recoverform").hide();
                $("#loginform").fadeIn();
            });
        </script>

    </body>

</html>