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
                                    <p class="mb-0">Please fill the below details to create your account</p>
                                </div>

                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Username -->
                                        <div class="col-12">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <input type="text" name="name" class="form-control" id="inputUsername" placeholder="John" value="{{ old('name') }}" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" value="{{ old('email') }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" required>
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="col-12">
                                            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password" required>
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Country -->
                                        <div class="col-12">
                                            <label for="inputSelectCountry" class="form-label">Country</label>
                                            <select class="form-select" id="inputSelectCountry" name="country">
                                                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                                <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                                <option value="America" {{ old('country') == 'America' ? 'selected' : '' }}>America</option>
                                                <option value="Dubai" {{ old('country') == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                            </select>
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Terms -->
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="terms" id="flexSwitchCheckChecked" required>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                @error('terms')
                                                    <small class="text-danger d-block">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Sign up</button>
                                            </div>
                                        </div>

                                        <!-- Login Link -->
                                        <div class="col-12">
                                            <div class="text-center">
                                                <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="login-separater text-center mb-5">
                                    <span>OR SIGN UP WITH EMAIL</span>
                                    <hr/>
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
