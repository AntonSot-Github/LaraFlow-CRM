@extends('layouts.app')

@section('title', "$client->name's deal - $deal->title")

@section('content')
    <div class="mb-3">
        <ul>
            @forelse ($deal->tasks as $task)
                <li>
                    <form method="POST" action="{{ route('tasks.toggle', $task) }}" style="display:inline">
                        @csrf
                        @method('PATCH')

                        <button type="submit">
                            {{ $task->is_done ? '☑' : '☐' }}
                        </button>
                    </form>
                    {{ $task->title }} — {{ $task->due_date }}
                    @if ($task->is_done)
                        ✔
                    @endif
                </li>
            @empty
                <li>No tasks yet</li>
            @endforelse
        </ul>
    </div>

    <div class="text-center">
        <form method="POST" action="{{ route('task.store', [$client, $deal]) }}">
            @csrf

            <input type="text" name="title" placeholder="Task title">

            <input class="me-4" type="date" name="due_date">

            <button class="btn btn-primary" type="submit">Add task</button>
        </form>
    </div>
    <a class="text-end" href="{{ route('clients.deals.index', $client) }}">← Back to deals</a>
@endsection
