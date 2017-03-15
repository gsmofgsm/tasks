@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>

    <ul class="list-group">

        @foreach($tasks as $task)

            <li class="list-group-item">
                <a href="tasks/{{ $task->id }}">
                {{ $task->title }}
                </a>
            </li>

        @endforeach

    </ul>
@endsection