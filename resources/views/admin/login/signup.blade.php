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
        <title>Sing Up</title>
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
                <div class="auth-box bg-light border-top border-secondary">
                    <div>
                        <div class="text-center p-t-10 p-b-20">
                            <h4 class="msg text-center text-dark">Register a new membership</h4>
                        </div>

                        {{ Form::open(['route'=>'register', 'method'=>'POST']) }}

                            <div class="row p-b-30">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <!-- email -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder=" Confirm Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="form-group mt-2 mb-0">
                                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="p-t-20">
                                            <button class="btn btn-block btn-rounded btn-primary" type="submit">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-25 m-b--5 text-center mt-0">
                                <a href="sign-in.html">You already have a membership?</a>
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
        </script>
    </body>

</html>