@extends('layouts.app')

@section('title', 'Start page')

@section('content')
    @if (@isset($user))
        <div class="d-flex justify-content-around ">
            <p>{{ $user->name }}</p>
            <a href="{{ route('clients.index') }}">Clients</a>
        </div>
        <div class="pt-4 w-100 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="ms-auto btn btn-primary" type="submit">Logout</button>
            </form>
        </div>
    @else
        <div class="w-100 text-center">
            <a class="mb-5" href="{{ route('login') }}">Login</a>
        </div>
    @endif




@endsection
