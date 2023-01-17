<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'user_id',
        'image',
        'slug',
        'title',
        'description',
        'body',
        'published_at',
        'active'
    ];

    public $translatable = ['title', 'description', 'body'];


    // Relationships

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function tags() : MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public function comments() : MorphToMany
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }


    public function categories() : MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }
}
