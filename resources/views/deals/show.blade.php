@extends('layouts.app')

@section('title', "$client->name's deal - $deal->title")

@section('content')

    <h3>Tasks</h3>

    <ul>
        @forelse ($deal->tasks as $task)
            <li>
                {{ $task->title }}
                @if ($task->is_done)
                    ✔
                @endif
            </li>
        @empty
            <li>No tasks yet</li>
        @endforelse
    </ul>

    <form method="POST" action="{{ route('tasks.store', [$client, $deal]) }}">
        @csrf

        <input type="text" name="title" placeholder="Task title">

        <input type="date" name="due_date">

        <button type="submit">Add task</button>
    </form>

    <x-comments :commentable="$deal" />


@endsection
