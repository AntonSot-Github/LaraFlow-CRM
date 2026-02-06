@extends('layouts.app')

@section('title', 'Clients list')

@section('content')

    <div class="container my-auto">
        @if ($clients->isEmpty())
            <p>No clients yet</p>
        @else
            <ul>
                @foreach ($clients as $client)
                    <li class="mb-3">
                        {{ $client->name }}
                        @if ($client->email)
                            — {{ $client->email }}
                        @endif
                        <a href="{{ route('clients.edit', $client) }}">Edit</a>

                        <form method="POST" action="{{ route('clients.destroy', $client) }}"
                            onsubmit="return confirm('Delete this client?')" style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
        <a href="{{ route('clients.create') }}">Add new client</a><br>
        <a href="{{ route('start') }}">Back to the start page</a>
    </div>
@endsection
