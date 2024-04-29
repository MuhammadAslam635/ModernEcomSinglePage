<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Review;
use App\Models\UserProductOrder;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'product_id' => $this->faker->randomNumber(),
            'order_id' => $this->faker->randomNumber(),
            'comment' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(-10000, 10000),
            'user_product_order_id' => UserProductOrder::factory(),
        ];
    }
}
