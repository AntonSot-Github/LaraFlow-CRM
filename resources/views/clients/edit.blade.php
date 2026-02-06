@extends('layouts.app')

@section('title', 'Edit client data')

@section('content')
    <form method="POST" action="{{ route('clients.update', $client) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name', $client->name) }}">
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email', $client->email) }}">
        </div>

        <div class="mb-2">
            <label>Phone</label><br>
            <input type="text" name="phone" value="{{ old('phone', $client->phone) }}">
        </div>

        @if ($errors->any())
            <div style="color:red">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit">Update</button>
    </form>

    <p>
        <a href="{{ route('clients.index') }}">← Back to list</a>
    </p>
@endsection
