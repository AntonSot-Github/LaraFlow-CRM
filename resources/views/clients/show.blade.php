@extends('layouts.app')

@section('title', $client->name)


@section('content')
    <h1>{{ $client->name }}</h1>
    <x-comments :commentable="$client" />

@endsection