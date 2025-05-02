<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 尝试生成一些口号或商业短语，可能沾边
            'name' => $this->faker->catchPhrase(),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'category_id' => $this->faker->numberBetween(1, 10),
            'stock' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement([1, 0]),
        ];
    }
}
