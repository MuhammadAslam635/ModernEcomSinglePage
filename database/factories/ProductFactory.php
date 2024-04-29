<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->text(),
            'qty' => $this->faker->numberBetween(-10000, 10000),
            'sale_qty' => $this->faker->numberBetween(-10000, 10000),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sale_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'status' => $this->faker->word(),
            'stock' => $this->faker->word(),
            'description' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'category_id' => Category::factory(),
        ];
    }
}
