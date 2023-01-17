<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(10)->create();
        $categories = Category::all();

        $articles = Article::all();
        foreach($articles as $article)
        {
            $article->categories()->saveMany($categories->random(3));
            
            $article->comments()->saveMany(Comment::factory(5)->create());

            $article->tags()->saveMany(Tag::factory(5)->create());
        }
    }
}
