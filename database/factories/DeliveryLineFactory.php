<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\DeliveryLine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryLine>
 */
class DeliveryLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryLine::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'delivery_id' => Delivery::factory(),
            'item' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 4, 300),
            'qty' => $this->faker->randomFloat(3, 0.1, 50),
        ];
    }
}
