<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
        $title = [];
        $description = [];
        $body = [];
        foreach(config('blog.language') as $lan){
            $title[$lan['code']] = fake()->sentence();
            $description[$lan['code']] = fake()->sentences();
            $body[$lan['code']] = fake()->paragraph(5);
        };
        return [
            'user_id' => $user->id,
            'slug' => Str::slug(fake()->sentence()),
            'title' => $title,
            'description' => $description,
            'body' => $body,
            'published_at' => now(),
            'active' => true,
        ];
        
    }
}
