<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Rating;
use App\Models\Tag;
use App\Http\Resources\BlogResource;

class BlogController extends Controller
{
    public function latestThreeBlogs()
    {
        $blogs = Blog::latest()->take(3)->get();
        return BlogResource::collection($blogs);
    }

    public function allBlogsByLatest()
    {
        $blogs = Blog::latest()->get();
        return BlogResource::collection($blogs);
    }

    public function allBlogsByOldest()
    {
        $blogs = Blog::oldest()->get();
        return BlogResource::collection($blogs);
    }

    public function mostInteractionsThreeBlogs()
    {
        $blogs = Blog::orderBy('interactions', 'desc')->take(3)->get();
        return BlogResource::collection($blogs);
    }

    public function mostInteractionsAllBlogs()
    {
        $blogs = Blog::orderBy('interactions', 'desc')->get();
        return BlogResource::collection($blogs);
    }

    public function leastInteractionsAllBlogs()
    {
        $blogs = Blog::orderBy('interactions')->get();
        return BlogResource::collection($blogs);
    }

    public function getBlogsByTags(Request $request)
    {
        $request->validate([
            'tags' => 'required',
        ]);

        $tags = $request->input('tags');

        if (!is_array($tags)) {
            $tags = [$tags];
        }

        $blogs = Blog::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('tag', $tags);
        })->get();

        return BlogResource::collection($blogs);
    }

    public function mitOhneAllesScharf($id)
    {
        $blog = Blog::with('comments')->findOrFail($id);

        $positiveCount = Rating::where('blog_id', $blog->id)->where('rating_value', 1)->count();
        $negativeCount = Rating::where('blog_id', $blog->id)->where('rating_value', 0)->count();

        $totalRating = $positiveCount - $negativeCount;

        $mainComments = [];
        $dateFormatBlog = 'd. M Y';
        $dateFormatComment = 'd m y H:i';
        if ($blog->comments !== null) {
            foreach ($blog->comments as $comment) {
                if ($comment->parent_id === null) {
                    $mainComment = [
                        'id' => $comment->id,
                        'author_id' => optional($comment->user)->id,
                        'author_name' => optional($comment->user)->name,
                        'profile_picture' => optional($comment->user)->profile_picture
                            ? asset('profile_images/' . $comment->user->profile_picture)
                            : asset('profile_images/default.jpg'),
                        'content' => $comment->content,
                        'created_at' => $comment->created_at->format($dateFormatComment),
                        'updated_at' => $comment->updated_at->format($dateFormatComment),
                        'sub_comments' => [],
                    ];

                    foreach ($blog->comments as $subComment) {
                        if ($subComment->parent_id === $comment->id) {
                            $mainComment['sub_comments'][] = [
                                'id' => $subComment->id,
                                'author_id' => optional($subComment->user)->id,
                                'author_name' => optional($subComment->user)->name,
                                'profile_picture' => optional($subComment->user)->profile_picture
                                    ? asset('profile_images/' . $subComment->user->profile_picture)
                                    : asset('profile_images/default.jpg'),
                                'content' => $subComment->content,
                                'created_at' => $subComment->created_at->format($dateFormatComment),
                                'updated_at' => $subComment->updated_at->format($dateFormatComment),
                            ];
                        }
                    }

                    $mainComments[] = $mainComment;
                }
            }
        }

        $responseData = [
            'id' => $blog->id,
            'author_id' => optional($blog->user)->id,
            'author_name' => optional($blog->user)->name,
            'profile_picture' => optional($blog->user)->profile_picture
                ? asset('profile_images/' . $blog->user->profile_picture)
                : asset('profile_images/default.jpg'),
            'title' => $blog->title,
            'image_url' => $blog->image_url
                ? asset('blog_images/' . $blog->image_url)
                : asset('blog_images/default.png'),
            'description' => $blog->description,
            'content' => $blog->content,
            'published_at' => optional($blog->published_at)->format($dateFormatBlog),
            'tags' => $blog->tags->pluck('tag'),
            'interactions' => $blog->interactions,
            'rating' => $totalRating,
            'positiv_rating' => $positiveCount,
            'negativ_rating' => $negativeCount,
            'created_at' => optional($blog->created_at)->format($dateFormatBlog),
            'updated_at' => optional($blog->updated_at)->format($dateFormatBlog),
            'comments' => $mainComments,
        ];

        return response()->json($responseData);
    }

    public function rateBlog(Request $request, $blogId)
    {
        $request->validate([
            'rating_value' => 'required|boolean', // Ensure rating_value is boolean (0 or 1)
        ]);

        $blog = Blog::findOrFail($blogId);

        $existingRating = Rating::where('user_id', auth()->id())
            ->where('blog_id', $blog->id)
            ->first();

        if ($existingRating) {
            $existingRating->update([
                'rating_value' => $request->rating_value,
            ]);
        } else {
            Rating::create([
                'user_id' => auth()->id(),
                'blog_id' => $blog->id,
                'rating_value' => $request->rating_value,
            ]);
        }

        return response()->json(['message' => 'Blog rated successfully']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:500',
            'content' => 'required|array',
            'image_url' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);
        if ($request->has('id')) {
            $blog = Blog::findOrFail($request->id);
        } else {
            $blog = new Blog();
            $blog->user_id = auth()->id();
        }

        $oldImageUrl = $blog->image_url;

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            if ($oldImageUrl) {
                $oldImagePath = public_path($oldImageUrl);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = 'blog_' . $blog->id . '_' . date('YmdHis') . '.' . $image->extension();
            $image->storeAs('public/blog_images', $imageName);
            $blog->image_url = 'storage/blog_images/' . $imageName;
        }

        $blog->save();

        if ($request->has('tags')) {
            foreach ($request->tags as $tagName) {
                $tag = Tag::firstOrCreate(['tag' => $tagName]);
                $blog->tags()->attach($tag->id);
            }
        }

        return response()->json(['message' => 'Blog post created successfully'], 201);
    }
    public function publish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->published = !$blog->published;

        if ($blog->published) {
            $blog->published_at = now();
        } else {
            $blog->published_at = null;
        }
        $blog->save();

        return response()->json(['message' => 'Blog published/unpublished successfully'], 200);
    }
    
    public function writeComment(Request $request, $blogId)
    {
    
    }
}