<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Client;

/**
 * @method void authorize(string $ability, mixed $arguments = null)
 */

class DealController extends Controller
{
    public function index(Client $client)
    {
        //Get client's deals with help of connection
        $deals = $client->deals()->latest()->get();

        return view('deals.index', compact('client', 'deals'));
    }

    public function show(Client $client, Deal $deal)
    {
        $this->authorize('view', $deal);
        return view('deals.show', compact('client', 'deal'));
    }

    public function create(Client $client)
    {
        return view('deals.create', compact('client'));
    }

    public function store(Request $request, Client $client)
    {
        $data = $request->validate([
            'title'  => 'required|string|max:255',
            'amount' => 'nullable|numeric|min:0',
            'status' => 'required|string',
        ]);

        $client->deals()->create($data);

        return redirect()->route('clients.deals.index', $client)->with('success', 'Deal was created succesfully');
    }

    public function edit(Client $client, Deal $deal)
    {
        return view('deals.edit', compact('client', 'deal'));
    }

    public function update(Request $request, Client $client, Deal $deal)
    {
        $data = $request->validate([
            'title'  => 'required|string|max:255',
            'amount' => 'nullable|numeric|min:0',
            'status' => 'required|string',
        ]);

        $deal->update($data);

        return redirect()->route('clients.deals.index', $client)->with('success', "Deal '$deal->title' was changed succesfully");
    }

    public function destroy(Client $client, Deal $deal)
    {
        $deal->delete();

        return redirect()->route('clients.deals.index', $client)->with('success', "Deal '$deal->title' has deleted");
    }
}
