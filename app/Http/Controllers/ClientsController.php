<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients', [
            'clients' => $clients,
            'title' => 'Clients',
        ]);
    }
}
