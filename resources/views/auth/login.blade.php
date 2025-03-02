<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CMS || Login</title>
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!-- loader-->
    <link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
</head>



<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5">
                                    <div class="text-center">
                                        <img src="assets/images/logo-icon.png" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                    </div>
                                    <div class="login-separater text-center"> <span>LOGIN WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <form form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <!-- Password -->
                                        <div class="form-group mt-4">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            <x-primary-button class="btn btn-primary btn-block">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                            <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

</html>