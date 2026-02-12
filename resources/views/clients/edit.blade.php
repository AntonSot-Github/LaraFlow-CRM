@extends('layouts.app')

@section('title', 'Edit client data')

@section('content')
    <div class="w-100 d-flex flex-row justify-content-center">
        <form method="POST" action="{{ route('clients.update', $client) }}" class="d-flex flex-column justify-center align-items-center">
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

            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>

    <div class="w-100 d-flex flex-row justify-content-end">
        <a href="{{ route('clients.index') }}">← Back to list</a>
    </div>
@endsection
