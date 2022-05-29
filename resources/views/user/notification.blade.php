<html>

    <head>

        <title>Notifikasi Pembeli</title>

    </head>

    <body>
        <table border=5 width=50% align=”center”>
            <tr>
            <td bgcolor=grey colspan=”2″ align=”center”><font color=white>Notifikasi Pembeli</td>
            </tr><tr>
<td>@foreach($notification as $data)
<div>{{$data->created_at}}</div>
<div>{{$data->data}}</div>
<br>
@endforeach