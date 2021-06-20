<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Planner</title>

    <link rel="stylesheet" href="{{asset('/custom//dist/css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('/custom//dist/css/responsive.css')}}">


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });

    </script>


</head>

<body>
    <header>
        <div class="container">
            <div class="header-left">
                <!-- <img class="logo" src="https://prog-8.com/images/html/advanced/main_logo.png"> -->
                <h3 style="line-height: 20px; color:white;">Daily Planner </h3>
            </div>
            <a href="/workspace" class="header-workspace">Workspace</a>

            <!-- <a class="header-left">Workspace</a> -->
            <!-- The to do list to organize work & life -->
            <a class="header-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                    class="fas fa-sign-out-alt"></i>Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
    </header>
    <!-- <div class="menu">
               
            </div> -->

    <div class="content">


        @yield('content')

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script>
        function openForm(text) {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("category").value = text;

        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

    </script>

    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.description',
        width: 900,
        height: 300
    });
</script> -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });

    </script>
    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

    </script>
    <script src="https://kit.fontawesome.com/9981c01396.js" crossorigin="anonymous"></script>

</body>

</html>
