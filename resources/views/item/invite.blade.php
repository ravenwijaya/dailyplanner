<html>

<head>

</head>

<body style="text-align: center;">
<h1>Daily Planner</h1>
    <p>Workspace Invitation</p>
    <p>Hey there! {{Auth::user()->name}} has invited you to their Workspace on Daily Planner</p>
    <a style="background-color: lightgreen;
font-size: 30px;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="{{$link}}" class="w3-button w3-deep-orange">Join Workspace </a>
</body>

</html>
