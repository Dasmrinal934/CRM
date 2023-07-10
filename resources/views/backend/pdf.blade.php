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
  <h5 style="text-align:center"><img src="{{url('frontend/img/logo5.png')}}" alt="Liyaans Properties" width="300"/></h5>
<h4 style="text-align:center"> Attandence Retort {{Session::get('UserName')}} </h4>
<p>({{$fromdate}} - {{$todate}})</p>

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
