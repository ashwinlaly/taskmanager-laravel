<h1>
    Hi {{ $task->user->name }},
</h1>
<p>
    You're assigned to do a task in {{ $task->project->name }}
    <br/>
    <small>
        <b><i>{{ $task->description }}</i></b>
    </small>
</p>
<table>
    <tr>
        <td>User name</td>
        <td>{{ $task->user->email }}</td>
    </tr>
    <tr>
        <td>Password</td>
        <td>{{ $task->user->password }}</td>
    </tr>
</table>
<a href="{{$url}}"> Click here to login <a>