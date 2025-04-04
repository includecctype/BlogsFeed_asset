<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::inRandomOrder()->first();
        $id = $user->id;
        $name = $user->name;

        return [
            'post_text' => fake()->paragraph(4),
            'post_file' => fake()->image(),
            'user_id' => $id,
            'username' => $name
        ];
    }
}
