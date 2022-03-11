<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link href="{{ asset('portal/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('portal/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('portal/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('portal/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="login-form" class="form-transparent clearfix" method="POST" action="">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('portal/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('portal/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('portal/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ asset('portal/dist/js/sb-admin-2.js') }}"></script>
</body>

</html>
