<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\BlogResource;
class UserController extends Controller
{

    public function profile(Request $request)
    {
        $user = $request->user(); // Retrieve the authenticated user
        return response()->json($user);
    }

    public function show()
    {
        return new UserResource(User::findOrFail(auth()->id()));
    }

    public function me(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return response()->json([
                'name' => $user->name,
                'profile_picture' => optional($user)->profile_picture
                    ? asset('profile_images/' . $user->profile_picture)
                    : asset('storage/profile_images/default.jpg'),
            ]);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function getUserProfile($id)
    {
        $user = User::with('blogs')->findOrFail($id);

        $user->load('socials');

        $blogs = BlogResource::collection($user->blogs);

        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'profile_picture' => optional($user)->profile_picture
                    ? asset('profile_images/' . $user->profile_picture)
                    : asset('storage/profile_images/default.jpg'),
            'about_me' => $user->about_me,
            'description' => $user->description,
            'blogs' => $blogs,
        ];

        if ($user->socials) {
            $userData['socials'] = $user->socials;
        }

        return response()->json($userData);
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'profile_picture' => 'nullable|mimes:jpeg,png,jpg,gif|max:300',
            'about_me' => 'nullable|string|max:500',
            'interests' => 'nullable|string|max:500',
        ]);

        $user = User::findOrFail($id);

        $oldImg = $user->profile_picture;

        $user->about_me = $request->about_me;
        $user->interests = $request->interests;

        if ($request->hasfile('profile_picture')) {
            if ($oldImg) {
                $oldImgPath = public_path($oldImg);
                if (file_exists($oldImgPath)) {
                    unlink($oldImgPath);
                }
            }
            $picture = $request->file('profile_picture');
            $pictureName = 'user_' . $user->id . '_' . date('YmdHis') . '.' . $picture->extension();
            Storage::disk('public')->put('/profile_images' . $pictureName, file_get_contents($picture));
            $user->profile_picture = 'storage/profile_images/' . $pictureName;
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully'], 201);
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
