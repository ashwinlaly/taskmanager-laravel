<h1>
    Hi {{ $data['user'] }},
</h1>
<p>
    You're invited to Task Manager by {{ $data['invite_user'] }}
    <br/>
    <small>
        <b><i>Task Manager is a simple Web Application used to manage task to the users.</i></b>
    </small>
</p>
<table>
    <tr>
        <td>User name</td>
        <td>{{ $data['user_email'] }}</td>
    </tr>
    <tr>
        <td>Password</td>
        <td>{{ $data['password'] }}</td>
    </tr>
</table>
<a href="{{$url}}"> Click here to login <a>