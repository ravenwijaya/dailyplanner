<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/loginf7/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('/loginf7/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/loginf7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/loginf7/css/style.css')}}">

    <title>Login #7</title>
</head>

<body>
    <!-- 
{{asset('/loginf7/')}} -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('/loginf7/images/undraw_remotely_2j6y.svg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">Welcome to Daily Planner</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group first">

                                    <label for="email">Email</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    
                                   
                                    @if (Route::has('password.request'))
                                    <a class="ml-auto forgot-pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                                </div>

                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('register'))
                                <a class="d-block text-center my-4 text-muted" href="{{ route('register') }}">
                                    {{ __('Daftar Akun') }}
                                </a>
                                @endif

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{asset('/loginf7/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/loginf7/js/popper.min.js')}}"></script>
    <script src="{{asset('/loginf7/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/loginf7/js/main.js')}}"></script>
</body>

</html>
