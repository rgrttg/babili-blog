<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $dateFormat = 'd. M Y';

        return [
            'id' => $this->id,
            'author_id' => optional($this->user)->id,
            'author_name' => optional($this->user)->name,
            'profile_picture' => optional($this->user)->profile_picture,
            'title' => $this->title,
            'image_url' => $this->image_url,
            'content' => $this->content,
            'published_at' => optional($this->published_at)->format($dateFormat),
            'interactions' => $this->interactions,
            'created_at' => optional($this->created_at)->format($dateFormat),
            'updated_at' => optional($this->updated_at)->format($dateFormat),
        ];
    }
}
