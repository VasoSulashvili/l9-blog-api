<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('email', '=', 'root@blog.com')->first();
        if($user === null)
        {
            $user = User::factory()->create();
        }
        return [
            'user_id' => $user->id,
            'body' => fake()->sentences(2, true)
        ];
    }
}
