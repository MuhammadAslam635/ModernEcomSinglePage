<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\OrderItem;
use App\Models\OrderProduct;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->randomNumber(),
            'product_id' => $this->faker->randomNumber(),
            'qty' => $this->faker->numberBetween(-10000, 10000),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'review' => $this->faker->boolean(),
            'order_product_id' => OrderProduct::factory(),
        ];
    }
}
