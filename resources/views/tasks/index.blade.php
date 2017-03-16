@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>

    <ul class="list-group">

        @foreach($tasks as $task)

            <li class="list-group-item">
                <a href="{{ $task->user->name }}/tasks">
                    {{ $task->user->name }}
                </a>

                --

                <a href="tasks/{{ $task->id }}">
                    {{ $task->title }}
                </a>

                <form action="tasks/{{$task->id}}" method="POST">
                    <input type="hidden" name="_method" value="PATCH"/>
                    {{ csrf_field() }}


                    <input type="checkbox" name="completed" value="1"> completed

                    <button type="submit">submit</button>

                </form>
            </li>

        @endforeach

    </ul>

    @if( isset($users) )
        <hr>

        <h3>Add a new task</h3>

        @include('tasks.form')

    @endif
@endsection