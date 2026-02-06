<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();


        return view('clients.index', compact('clients'));
    }

    //Create client
    public function create()
    {
        return view('clients.create');
    }

    //Save client to DB
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index');
    }

    //Edit client data
    public function edit(Client $client)
    {
        $title = 'Data edition';
        return view('clients.edit', compact('client', 'title'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('clients.index')->with('success', 'Client\'s data was changed');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', "$client->name was deleted from DataBase");
    }
}
