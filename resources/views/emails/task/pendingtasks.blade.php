<p>
    <small>
        <b>
            <i>
            {{ $task->project->name }} project has {{ $task->description }} to be done
            deadline was on {{ date('Y-m-d', $task->deadline) }}. 
            {{ $task->user->name }} was the Assignee
            </i>
        </b>
    </small>
</p>