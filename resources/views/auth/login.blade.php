@extends('layouts.app')

@section('title', $title)

@section('content')


    <form method="POST" action="/login">
        @csrf

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}" autocomplete="off">
        </div>

        <div>
            <label>Password</label><br>
            <input type="password" name="password" autocomplete="off">
        </div>

        @if ($errors->any())
            <div style="color: red;">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit">Login</button>
    </form>

@endsection
