<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{



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
}
