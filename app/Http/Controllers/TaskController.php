<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;

class TaskController extends Controller
{
    public function store(Request $request, Deal $deal)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        $deal->tasks()->create($data);

        return back();
    }
}
