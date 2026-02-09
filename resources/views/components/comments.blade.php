@extends('layouts.app')

@section('title', 'Add comment')

@section('content')
    @forelse ($commentable->comments as $comment)
        <div style="border:1px solid #ccc; padding:8px; margin-bottom:6px;">
            <strong>{{ $comment->user->name }}</strong><br>
            {{ $comment->body }}
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse

    <form method="POST" action="{{ route('comments.store') }}">
        @csrf

        <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
        <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">

        <div>
            <textarea name="body" rows="3" placeholder="Write a comment..."></textarea>
        </div>

        <button type="submit">Add comment</button>
    </form>

@endsection
