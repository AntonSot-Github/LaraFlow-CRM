@extends('layouts.app')

@section('title', $title)

@section('content')


    <form class="d-flex flex-column align-items-center" method="POST" action="/login">
        @csrf

        <div class="mb-2">
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}" autocomplete="off">
        </div>

        <div class="mb-3">
            <label>Password</label><br>
            <input type="password" name="password" autocomplete="off">
        </div>

        @if ($errors->any())
            <div style="color: red;">
                {{ $errors->first() }}
            </div>
        @endif

        <button class="btn btn-primary" type="submit">Login</button>
    </form>

@endsection
