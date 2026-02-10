@extends('layouts.app')

@section('title', "$client->name's deal - $deal->title")

@section('content')

    <a href="{{ route('tasks.show', [$client, $deal]) }}">Tasks</a>

    <x-comments :commentable="$deal" />


@endsection
