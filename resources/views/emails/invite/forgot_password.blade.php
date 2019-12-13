<h1>
    Hi {{ $data[0]['name'] }},
</h1>
<table>
    <tr>
        <td>User name</td>
        <td>{{ $data[0]['email'] }}</td>
    </tr>
    <tr>
        <td>Password</td>
        <td>{{ $data[0]['password'] }}</td>
    </tr>
</table>
<a href="{{$url}}"> Click here to login <a>