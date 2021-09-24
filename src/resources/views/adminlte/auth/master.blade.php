
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} | {{ $page_title ?? ''}}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/core-cdn/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="/core-cdn/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/core-cdn/adminlte/dist/css/adminlte.min.css">
    </head>

    <body class="login-page">
        <div class="login-box">

            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Admin</b>LTE</a>
                </div>

                @yield('content')
            </div>
            
            {{-- <div class="login-logo">
                <a href="/core-cdn/adminlte/index2.html"><b>{{ config('app.name') }}</b></a>
            </div><!-- /.login-logo -->

            @yield('content') --}}

        </div><!-- /.login-box -->

        <!-- jQuery -->
        <script src="/core-cdn/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/core-cdn/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/core-cdn/adminlte/dist/js/adminlte.min.js"></script>
        <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
        </script>
    </body>
</html>
