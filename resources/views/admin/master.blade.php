<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        {{--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}admin/template/assets/images/favicon.png">--}}
        <title>@yield('title')</title>
        <!-- Custom CSS -->
        <link href="{{ asset('/') }}admin/template/assets/libs/flot/css/float-chart.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('/') }}admin/template/dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{--ckeditor--}}
        <script src="{{ asset('/') }}admin/ckeditor/ckeditor.js"></script>
        <script src="{{ asset('/') }}admin/ckeditor/samples/js/sample.js"></script>
        <link rel="stylesheet" href="{{ asset('/') }}admin/samples/ckeditor/css/samples.css">
        <link rel="stylesheet" href="{{ asset('/') }}admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

        {{--datatables--}}
        <link href="{{ asset('/') }}admin/template/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

        {{--fontawesome--}}
        <link rel="stylesheet" href="{{ asset('/') }}admin/fontawesome/all.min.css">
    </head>

    <body>
        <div id="main-wrapper">

            @include('admin.includes.header')

            @include('admin.includes.menu')

            @yield('body')

            @include('admin.includes.footer')
        </div>

        <script src="{{ asset('/') }}admin/template/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('/') }}admin/template/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <script src="{{ asset('/') }}admin/template/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="{{ asset('/') }}admin/template/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="{{ asset('/') }}admin/template/dist/js/custom.min.js"></script>
        <!--This page JavaScript -->
        <!-- <script src="{{ asset('/') }}admin/template/dist/js/pages/dashboards/dashboard1.js"></script> -->
        <!-- Charts js Files -->
        <script src="{{ asset('/') }}admin/template/assets/libs/flot/excanvas.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/flot/jquery.flot.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/flot/jquery.flot.pie.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/flot/jquery.flot.time.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/flot/jquery.flot.stack.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/flot/jquery.flot.crosshair.js"></script>
        <script src="{{ asset('/') }}admin/template/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="{{ asset('/') }}admin/template/dist/js/pages/chart/chart-page-init.js"></script>

        {{--datatables--}}
        <script src="{{ asset('/') }}admin/template/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
            $('#zero_config').DataTable();
        </script>

        {{--ckeditor--}}
        <script>
            initSample();
        </script>

        {{--fontawesome--}}
        <script src="{{ asset('/') }}admin/fontawesome/all.min.js"></script>


    </body>

</html>