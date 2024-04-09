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

    public function incrementInteractions($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->interactions++;
        $blog->save();
    }

    protected $fillable = ['title', 'description', 'content', 'user_id', 'image_url', 'published', 'published_at', 'interactions'];

    protected $casts = [
        'content' => 'json',
        'published_at' => 'datetime',
    ];
}
