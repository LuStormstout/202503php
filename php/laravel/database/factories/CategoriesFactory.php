<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 随机生成一个唯一的单词作为分类名称
            'name' => $this->faker->unique()->word(),

//            'name' => $this->faker->unique()->randomElement([
//                'Technology', 'Health', 'Education', 'Travel', 'Finance',
//            ]),
        ];
    }
}
