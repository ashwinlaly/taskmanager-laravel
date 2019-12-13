@extends('layouts.app')

@section('content')

    <div class="row dashboard">
        <div class="col-lg-1"></div>
        <div class="col-lg-2">
            <label>Users Count</label>
            <div class="jumbotron">
                {{ $user_count }}
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2">
            <label>Projects Count</label>
            <div class="jumbotron display-1">
                {{ $project_count }}
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2">
            <label>Task Pending Count</label>
            <div class="jumbotron display-1">
                <a href="{{url('mytask')}}">
                    {{ $pending_task_count }}
                </a>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <!-- <div class="col-lg-2">
            <label>Task Completed Count</label>
            <div class="jumbotron display-1">
                <a href="{{url('mytask')}}">
                    {{ $completed_task_count }}
                </a>
            </div>
        </div> -->
    </div>

@endsection
