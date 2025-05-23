<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio Heroe | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{url('/')}}" class="h1" style="color: #9a2640;"><b
                        style="color: #1220bb;">Colegio</b>Heroe</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

                @include('_message')
                <form action="{{url('login')}}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Correo">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Recordar usuario
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">Olvidé mi contraseña</a>
                </p>
                <p class="mb-1 text-center" style="color: #1220bb;">
                    ¿No tienes cuenta? <b>Solicita en recepción</b>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{url('public/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('public/assets/dist/js/adminlte.min.js')}}"></script>
</body>

</html>