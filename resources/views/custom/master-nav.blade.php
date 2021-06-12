<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Planner</title>
    <link rel="stylesheet" href="{{asset('/custom//dist/css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('/custom//dist/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/9981c01396.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-left">
                <!-- <img class="logo" src="https://prog-8.com/images/html/advanced/main_logo.png"> -->
                <h3 style="line-height: 20px; color:white;">Daily Planner </h3>
            </div>
            <!-- The to do list to organize work & life -->
            <a class="header-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                    class="fas fa-sign-out-alt"></i>Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </header>
    <div class="content">

        @yield('content')

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>

</html>
