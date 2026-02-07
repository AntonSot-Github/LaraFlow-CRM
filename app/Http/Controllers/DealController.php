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

    
}
