<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function start()
    {
        
        $user = Auth::user();
        return view('start',compact('user'));
    }
}
