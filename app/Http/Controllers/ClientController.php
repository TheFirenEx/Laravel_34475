<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {

        $clients = Client::paginate(20);

        return view('clients.index', compact('clients'));

    }
}
