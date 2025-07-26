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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->hasMany(PostReaction::class);
    }

    public function likes()
    {
        return $this->reactions()->where('type', 'like');
    }

    public function dislikes()
    {
        return $this->reactions()->where('type', 'dislike');
    }

    public function isLikedByUser($userId)
    {
        return $this->reactions()->where('user_id', $userId)->where('type', 'like')->exists();
    }


}
