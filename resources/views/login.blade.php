<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Human Resources | Log in</title>

    <link rel="icon" type="image/x-icon" href="{{ url('public/backend/dist/img/AdminLTELogo.png') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/backend/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Human </b>Resources</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            @include('_message')

            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ url('login_post') }}" method="post">

                    {{ csrf_field() }}

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color: red;">{{ $errors->first('email') }}</span>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <span style="color: red;">{{ $errors->first('password') }}</span>

                    <div class="row">
                        <div class="col-8">
                            
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{ url('forgot-password') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ 'register' }}" class="text-center">Register a new membership</a>
                </p>
                <hr>
                <p>Demo HR login: <br> U: demo_admin@openapps.dev | P: 123456789</p>
                <hr>
                <p>Demo Employee login: <br> U: emp@gmail.com | P: 123456789</p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('public/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public/backend/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
