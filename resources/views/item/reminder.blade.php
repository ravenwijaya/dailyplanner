<html>

<head>

</head>

<body style="text-align: left;">
<h1>Dailyplanner</h1>
@foreach($reminders as $reminder)
    <h2>{{$reminder['judul']}} </h1>
    <p>deadline {{$reminder['deadline']}}</p>
  @endforeach
</body>

</html>
