<?php

namespace Database\Factories;

use App\Models\Metadata;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Metadata>
 */
class MetadataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'like_count' => $this->faker->numberBetween(0, 1000),
            'view_count' => $this->faker->numberBetween(0, 10000),
            'comment_count' => $this->faker->numberBetween(0, 500),
            'share_count' => $this->faker->numberBetween(0, 200),
            'favorite_count' => $this->faker->numberBetween(0, 300),
            'post_id' => Post::factory(), // Or Post::inRandomOrder()->first()->id if posts are already seeded
        ];
    }
}
