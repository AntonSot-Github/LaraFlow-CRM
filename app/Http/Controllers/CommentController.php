<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string',
            'commentable_type' => 'required|string',
            'commentable_id' => 'required|integer',
        ]);

        $commentableClass = $data['commentable_type'];

        $commentable = $commentableClass::findOrfail($data['commentable_id']);

        $commentable->comments()->create([
            'body' => $data['body'],
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
