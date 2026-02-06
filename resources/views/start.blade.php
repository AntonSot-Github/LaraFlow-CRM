
@extends('layouts.app')

@section('title', 'Start page')

@section('content')
    @if (@isset($user))
        <p>{{ $user->name }}</p>
        <a href="{{ route('clients.index') }}">Clients</a>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif



    <div style="padding-top: 1rem">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endsection
