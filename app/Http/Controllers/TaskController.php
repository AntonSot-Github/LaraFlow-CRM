<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Client;
use App\Models\Task;

class TaskController extends Controller
{
    public function show(Client $client, Deal $deal)
    {
        return view('tasks.show', compact('client', 'deal'));
    }

    public function store(StoreTaskRequest $request, Client $client, Deal $deal)
    {
        if ($deal->client_id !== $client->id) {
            abort(404);
        }

        $deal->tasks()->create($request->validated());

        return back();
    }

    public function toggle(Task $task)
    {
        $task->update([
            'is_done' => ! $task->is_done,
        ]);

        return back();
    }
}
