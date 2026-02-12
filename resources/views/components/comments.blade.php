@forelse ($commentable->comments as $comment)
    <div style="border:1px solid #ccc; padding:8px; margin-bottom:6px;">
        <strong>{{ $comment->user->name }}</strong><br>
        {{ $comment->body }}
    </div>
@empty
    <p>No comments yet.</p>
@endforelse

<form method="POST" action="{{ route('comments.store') }}" class="d-flex flex-column justify-center align-items-center">
    @csrf

    <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
    <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">

    <div class="w-50 text-end">
        <div class="mb-3">
            <textarea class="w-100" name="body" rows="3" placeholder="Write a comment..."></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Add comment</button>
    </div>

</form>
