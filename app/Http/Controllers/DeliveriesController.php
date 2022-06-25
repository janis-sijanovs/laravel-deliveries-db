<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeliveriesResource;
use App\Models\Client;
use App\Models\Address;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Builder;

class DeliveriesController extends Controller
{
    public function getByClientID($id)
    {
        $deliveries = DeliveriesResource::collection(Delivery::whereHas('address', function ($query) use ($id) {
            $query->where('client_id', $id);
        })->get())->resolve();

        $client = Client::find($id);

        return view('deliveries', [
            'deliveries' => $deliveries,
            'client' => $client,
            'title' => 'Deliveries',
        ]);
    }
}
