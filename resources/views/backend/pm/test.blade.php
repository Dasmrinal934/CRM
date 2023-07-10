<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2> Attandence Retort ({{$fromdate}} - {{$todate}})</h2>

<table>
  <tr>
    <th>Date</th>
    <th>CheckIn Time</th>
    <th>Checkout Time</th>
  </tr>
@foreach($attandence as $row)

  <tr>
    <td>{{$row->Date}}</td>
     <td>{{$row->CheckInTime}}</td>
    <td>{{$row->CheckOutTime}}</td>
  </tr>
  @endforeach

</table>

</body>
</html>
