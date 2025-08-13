<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="backend/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{ asset ('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/assets/css/header-colors.css')}}" />
    <title>Rocker - Admin Dashboard</title>
    @yield('head')
</head>
<body>
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('backend/assets/images/logo-icon.png') }}" width="60" alt="logo" />
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Rocker Admin</h5>
                                        <p class="mb-0">Sign in to your account</p>
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success mb-2">{{ session('status') }}</div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <!-- Email -->
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" value="{{ old('email') }}" required autofocus>
                                                @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!-- Password -->
                                            <div class="col-12">
                                                <label for="inputPassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" class="form-control border-end-0" id="inputPassword" placeholder="Enter Password" required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                                @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!-- Remember Me -->
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                                </div>
                                            </div>
                                            <!-- Submit -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </div>
                                            <!-- Forgot Password -->
                                            <div class="col-12">
                                                <div class="text-center">
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Register Link -->
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="login-separater text-center mb-5">
                                        <span>OR SIGN IN WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="list-inline contacts-social text-center">
                                        <a href="javascript:;" class="list-inline-item bg-facebook text-white border-0 rounded-3"><i class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-twitter text-white border-0 rounded-3"><i class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-google text-white border-0 rounded-3"><i class="bx bxl-google"></i></a>
                                        <a href="javascript:;" class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i class="bx bxl-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/chartjs/js/chart.js')}}"></script>
    <script src="{{asset('backend/assets/js/index.js')}}"></script>
    <!--app JS-->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        new PerfectScrollbar(".app-container")
    </script>
</body>
</html>
