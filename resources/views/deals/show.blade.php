@extends('layouts.app')

@section('title', "$client->name's deal - $deal->title")

@section('content')



    <x-comments :commentable="$deal" />
    <div class="d-flex flex-row justify-content-between">
        <a class="btn btn-info" href="{{ route('tasks.show', [$client, $deal]) }}">Tasks</a>
        <a href="{{ route('clients.deals.index', $client) }}">← Back to deals</a>
    </div>
@endsection
