
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOMITA | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <!-- Modernize js -->
    <script src="{{asset('assets/js/modernizr-3.6.0.min.js')}}"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    {{-- <img src="{{asset('asset/img/logo2.png')}}" alt="logo">
                     --}}
                     <h2>Elève - Connexion</h2>
                     @if (session('error'))
                         <div style="color: red;">{{ session('error') }}</div>
                     @endif
                </div>
                <form action="{{route('eleve.login')}}" method="POST" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label>Matricule</label>
                        <input type="text" name="matricule" placeholder="Votre Email" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <a href="#" class="forgot-btn">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div>
        </div>
    </div>
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>