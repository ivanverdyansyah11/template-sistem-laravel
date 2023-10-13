<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Dashboard Sistem | Halaman {{ $title }}</title>

    {{-- STYLE CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- END STYLE CSS --}}
</head>

<body>

    <div class="container-fluid p-0 login">
        <div class="row justify-content-center justify-content-lg-end">
            <div class="col-lg-6">
                <div class="content-login d-flex flex-column align-items-center align-items-lg-start">
                    @if (session()->has('success'))
                        <div class="alert alert-success w-100 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session()->has('failed'))
                        <div class="alert alert-danger w-100 mb-4" role="alert">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <img src="{{ asset('assets/img/brand/brand-logo.svg') }}" alt="Brand Nusa Kendala Logo Teks"
                        draggable="false" class="login-brand">
                    <h2 class="login-title mt-xl-5">Login</h2>
                    <form class="form d-inline-block w-100" method="POST" action="">
                        @csrf
                        <div class="row flex-column align-items-center align-items-lg-start">
                            <div class="col-md-9 col-xl-7 mb-2">
                                <div class="input-wrapper">
                                    <input type="email" id="email" class="input" name="email"
                                        autocomplete="off" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-md-9 col-xl-7 row-button">
                                <div class="input-wrapper">
                                    <input type="password" id="password" class="input" name="password"
                                        autocomplete="off" placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="col-md-9 col-xl-7 d-flex justify-content-center justify-content-lg-start">
                                <button type="submit" class="button-primary d-flex align-items-center gap-2">
                                    Login Account
                                    <div class="arrow-icon"></div>
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="link-redirect">Don’t have an account? <a href="{{ route('register') }}">Register for
                            Free</a></p>
                </div>
            </div>
            <div class="col banner-login d-none d-lg-inline-block"></div>
        </div>
    </div>

    {{-- SCRIPT JS --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- END SCRIPT JS --}}
</body>

</html>
