<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'image',
        'title',
        'content',
        'status',
        'views',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

        public function category()
    {
        return $this->belongsTo(Category::class);
    }

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
