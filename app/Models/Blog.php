<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_blog');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    protected $casts = [
        'published_at' => 'datetime',
    ];
}
