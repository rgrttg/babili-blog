<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $dateFormat = 'd. M Y';

        $defaultImagePath = asset('blog_images/default.png');
        $image = $this->blog_image ? asset('blog_images/' . $this->blog_image) : $defaultImagePath;

        return [
            'id' => $this->id,
            'author_id' => optional($this->user)->id,
            'author_name' => optional($this->user)->name,
            'profile_picture' => optional($this->user)->profile_picture,
            'title' => $this->title,
            'blog_image' => $image,
            'description' => $this->description,
            'content' => $this->content,
            'published_at' => optional($this->published_at)->format($dateFormat),
            'interactions' => $this->interactions,
            'created_at' => optional($this->created_at)->format($dateFormat),
            'updated_at' => optional($this->updated_at)->format($dateFormat),
        ];
    }
}
