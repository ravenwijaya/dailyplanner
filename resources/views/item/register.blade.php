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

    <title>Register</title>
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
                                <h3>Register</h3>
                                <p class="mb-4">Welcome to Daily Planner</p>
                            </div>
                            <form method="POST"  action="{{ route('register') }}">
                                @csrf
                                 <input type="hidden" type="text" id="inviteid" value=" {{$id}}" name="inviteid" readonly>
                                <div class="form-group first">
                  
                                        <input id="name" type="text" placeholder="Name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                   

                                </div>
                                <div class="form-group first">

                                    <!-- <label for="email">Email</label> -->

                                    <input id="email" type="email"placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email}}" required autocomplete="email" readonly>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                </div>
                                <div class="form-group first">
                                    
                                    <input id="password" type="password" placeholder="Password" 
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                </div>
                                <div class="form-group last mb-4">
                      

                                    
                                        <input id="password-confirm" type="password" class="form-control"placeholder="Confirm Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                   
                                </div>





                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Create Account') }}
                                </button>
                                @if (Route::has('login'))
                                <a class="d-block text-center my-4 text-muted" href="{{ route('login') }}">
                                    Already have an account? <span>Log In</span>
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
