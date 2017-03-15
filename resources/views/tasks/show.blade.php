@extends('layouts.app')

@section('content')

    <h1>{{ $task->title }}</h1>

    <article>{{ $task->body }}</article>

    <p>
        <a href="/tasks">Back</a>
    </p>

@endsection