<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Foxia - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>


<body>

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="home-btn d-none d-sm-block">
    <a href="{{ url('/') }}" class="text-white"><i class="mdi mdi-home h1"></i></a>
</div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <div class="p-3">
                <div class="float-right text-right">
                    <h4 class="font-18 mt-3 m-b-5">Welcome Back !</h4>
                    <p class="text-muted">Sign in to continue to Foxia.</p>
                </div>
                <a href="index.html" class="logo-admin"><img src="{{ asset('admin/assets/images/logo_dark.png') }}" height="26" alt="logo"></a>
            </div>

            <div class="p-3">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                   </div>


                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">

                        @error('password')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>



                    <div class="form-group row m-t-30">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" iname="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>


                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 mb-0 row">
                        <div class="col-12 text-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> {{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center text-white-50">
        <p>Don't have an account ? <a href="pages-register.html" class="font-600 text-white"> Signup Now </a> </p>
        <p>© 2018 - 2019 Foxia. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
    </div>

</div>

<!-- jQuery  -->
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/waves.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.slimscroll.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>
</html>