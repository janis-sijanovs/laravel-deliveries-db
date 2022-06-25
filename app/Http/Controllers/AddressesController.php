<?php

namespace App\Http\Controllers;

use App\Http\Resources\LastDeliveriesResource;
use App\Models\Address;
use Illuminate\Database\Eloquent\Builder;

class AddressesController extends Controller
{
    public function getByClientID($id)
    {
        return Address::where('client_id', $id)->get();
    }

    public function inactiveAddresses()
    {
        $addresses = Address::whereDoesntHave('deliveries', function (Builder $query) {
            $query->where('type', 2);
        })->get();

        return view('client_addresses', [
            'addresses' => $addresses,
            'title' => 'Inactive Addresses',
        ]);
    }

    public function addressLastDeliveries()
    {
        $addresses = LastDeliveriesResource::collection(Address::when('last_delivery')->has('last_delivery')->get())->resolve();

        return view('last_deliveries', [
            'addresses' => $addresses,
            'title' => 'Last Deliveries',
        ]);
    }

    public function getAddressesWithMultipleDeliveryTypes()
    {

        $addresses = Address::whereHas('deliveries', function (Builder $query) {
            $query->where('type', 2);
        })->whereHas('deliveries', function (Builder $query) {
            $query->where('type', 1);
        })->get();

        return view('client_addresses', [
            'addresses' => $addresses,
            'title' => 'Order Types',
        ]);
    }
}
