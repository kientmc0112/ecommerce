<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('portal/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('portal/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Datatable -->
    <link href="{{ asset('portal/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('portal/dist/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('portal/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('portal/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    @yield('css')

    <!-- jQuery -->
    <script src="{{ asset('portal/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('portal.layouts.navbar')

        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('portal/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('portal/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('portal/bower_components/raphael/raphael-min.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('portal/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('portal/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('portal/dist/js/sb-admin-2.js') }}"></script>

    <!-- CKeditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    @yield('js')

    <script>
        $(document).ready(function() {
            $(document).on("click", "#logout", function() {
                $("#logout-form").submit()
            })
        })
    </script>
</body>

</html>
