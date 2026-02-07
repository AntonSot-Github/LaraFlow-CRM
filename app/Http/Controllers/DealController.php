<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Client;

class DealController extends Controller
{
    public function index(Client $client)
    {
        //Get client's deals with help of connection
        $deals = $client->deals()->latest()->get();

        return view('deals.index', compact('client', 'deals'));
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

        return redirect()->route('clients.deals.index', $client);
    }
}
