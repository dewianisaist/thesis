<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.4
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sistem Seleksi Peserta Pelatihan</title>

    <!-- Icons -->
    <link href={{ asset('user_theme/assets/font-awesome/css/font-awesome.min.css') }} rel="stylesheet">
    <link href={{ asset('admin_theme/css/simple-line-icons.css') }} rel="stylesheet">

    <!-- Main styles for this application -->
    <link href={{ asset('admin_theme/css/style-user.css') }} rel="stylesheet">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary px-2">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>Register</h2>
                                <p>Pendaftaran Pelatihan BLK Bantul telah dibuka. Anda ingin bergabung?</p>
                                <a class="btn btn-primary active mt-1" href="/user/register">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src={{ asset('bower_components/jquery/dist/jquery.min.js') }}></script>
    <script src={{ asset('bower_components/tether/dist/js/tether.min.js') }}></script>
    <script src={{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}></script>



</body>

</html>