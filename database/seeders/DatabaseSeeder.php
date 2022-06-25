<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\DeliveryLine;
use App\Models\Route;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $routes = Route::factory(10)->create();

        Client::factory(50)->create()->each(function ($client) use ($routes) {
            Address::factory(rand(2, 5))->create([
                'client_id' => $client->id,
            ])->each(function ($address) use ($routes) {
                Delivery::factory(rand(2, 5))->create([
                    'address_id' => $address->id,
                    'route_id' => $routes->random()->id
                ])->each(function ($delivery) {
                    DeliveryLine::factory(rand(2, 5))->create([
                        'delivery_id' => $delivery->id,
                    ]);
                });
            });
        });
    }
}
