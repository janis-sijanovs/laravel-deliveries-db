<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Delivery;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Delivery::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'address_id' => Address::factory(),
            'route_id' => Route::factory(),
            'type' => $this->faker->numberBetween(1, 2),
            'status' => $this->faker->numberBetween(1, 3),
        ];
    }
}
