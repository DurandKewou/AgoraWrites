<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_id',
        'status',
        'published_at',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
