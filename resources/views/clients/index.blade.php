@extends('layouts.app')

@section('title', 'Clients list')

@section('content')
    <div class="container my-auto">
        @if ($clients->isEmpty())
            <p>No clients yet</p>
        @else
            <ul>
                @foreach ($clients as $client)
                    <li>
                        {{ $client->name }}
                        @if ($client->email)
                            — {{ $client->email }}
                        @endif
                        <a href="{{ route('clients.edit', $client) }}">Edit</a>
                    </li>
                @endforeach
            </ul>
        @endif
        <a href="{{ route('clients.create') }}">Add new client</a><br>
        <a href="{{ route('start') }}">Back to the start page</a>
    </div>
@endsection
