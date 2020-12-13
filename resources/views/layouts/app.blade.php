<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AutoFact | Incio Sesión</title>
    <link rel="shortcut icon" href="{{asset("assets/img/favicon.png")}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
</head>
<body class="login-page d-inline">
    @yield('content')
     <!-- jQuery -->
     <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
     <!-- Bootstrap 4 -->
     <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
     <!-- AdminLTE App -->
     <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
</body>
</html>
