<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use Illuminate\Http\Request;
use App\Models\Blog;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'input' => 'required|string',
        ]);

        $input = $request->input;

        $searchData = $this->searchDB($input);

        $tagIds = [];
        $titleIds = [];
        $descriptionIds = [];
        $contentIds = [];

        if (preg_match('/[\s,.\-_\/\\|!?:;\'"\[\]{}<>]+/', $input)) {
            $keywords = preg_split('/[\s,.\-_\/\\|!?:;\'"\[\]{}<>]+/', $input);

            for ($i = 0; $i < count($keywords); $i++) {

                $return = $this->searchDB($keywords[$i]);

                $tagIds = array_merge($tagIds, $return['tag']);
                $titleIds = array_merge($titleIds, $return['title']);
                $descriptionIds = array_merge($descriptionIds, $return['description']);
                $contentIds = array_merge($contentIds, $return['content']);
            }

            $tagIdCount = array_count_values($tagIds);
            arsort($tagIdCount);
            $tagIds = array_keys($tagIdCount);

            $titleIdCount = array_count_values($titleIds);
            arsort($titleIdCount);
            $titleIds = array_keys($titleIdCount);

            $descriptionIdCount = array_count_values($descriptionIds);
            arsort($descriptionIdCount);
            $descriptionIds = array_keys($descriptionIdCount);

            $contentIdCount = array_count_values($contentIds);
            arsort($contentIdCount);
            $contentIds = array_keys($contentIdCount);
        }

        $results = [
            'fullTextTag' => $searchData['tag'],
            'fulltextTitle' => $searchData['title'],
            'fulltextDescription' => $searchData['description'],
            'fulltextContent' => $searchData['content'],
            'keywordTag' => $tagIds,
            'keywordTitle' => $titleIds,
            'keywordDescription' => $descriptionIds,
            'keywordContent' => $contentIds
        ];

        $allIds = [];
        foreach ($results as $key => $value) {
            if (is_array($value)) {
                $allIds = array_merge($allIds, $value);
            }
        }
        $allIds = array_unique($allIds);

        $blogs = Blog::whereIn('id', $allIds)->paginate(5);
        return [
            'blogs' => BlogResource::collection($blogs),
            'results' => $results
        ];
    }

    private function searchDB($string)
    {
        $tagMatches = Blog::whereHas('tags', function ($query) use ($string) {
            $query->where('tag', 'like', '%' . $string . '%');
        })->pluck('id')->toArray();
        $tagCount = array_count_values($tagMatches);
        arsort($tagCount);
        $tagMatches = array_keys($tagCount);

        $titleMatches = Blog::where('title', 'like', '%' . $string . '%')
            ->pluck('id')
            ->unique()
            ->toArray();

        $descriptionMatches = Blog::where('description', 'like', '%' . $string . '%')
            ->pluck('id')
            ->toArray();
        $descriptionCount = array_count_values($descriptionMatches);
        arsort($descriptionCount);
        $descriptionMatches = array_keys($descriptionCount);

        $blogs = Blog::all();
        $contentMatches = [];

        foreach ($blogs as $blog) {
            $jsonContent = json_encode($blog->content);
            if (strpos($jsonContent, $string) !== false) {
                $contentMatches[] = $blog->id;
            }
        }

        $contentCount = array_count_values($contentMatches);
        arsort($contentCount);
        $contentMatches = array_keys($contentCount);

        $result = [
            'tag' => $tagMatches,
            'title' => $titleMatches,
            'description' => $descriptionMatches,
            'content' => $contentMatches
        ];

        return $result;
    }
}
