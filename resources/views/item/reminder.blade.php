<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
</head>
<body>

<h1>Daily Planner</h1>
<p>Deadline Reminder</p>

<table style="width:100%">
  <tr>
    <th>Todo Name</th>
    <th>Deadline</th>
  </tr>
  @foreach($reminders as $reminder)
  <tr>
    <td>{{$reminder['judul']}} </td>
    <td>{{$reminder['deadline']}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>
