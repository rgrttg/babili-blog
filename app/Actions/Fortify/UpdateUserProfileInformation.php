<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update( User $user, array $input): void
    {
        Validator::make($input, [
            'firstName' => ['string', 'max:255'],
            'lastName' => ['string', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'about_me' => ['nullable', 'string', 'max:500'],
            'interests' => ['nullable', 'string', 'max:500'],
            // 'socials' => 'nullable|array',
            // 'socials.*.platform' => 'required|string|in:portfolio,github,facebook,twitter,instagram,linkedin,discord,pinterest', // Adjust the allowed platforms as needed
            // 'socials.*.user_input' => 'nullable|string|max:255',

            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');


        // $image = $request->file('profile_image');
        // $imageName = 'profile_picture_'  . date('YmdHis') . '.' . $image->extension();
        // Storage::disk('public')->put('/profile_pictures/' . $imageName, file_get_contents($image));


        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // $imageName =
            // $path = Storage::disk('public')->put('/profile_images', $imageName);
            // $profile->profile_image = $path;
            $user->forceFill([
                'firstName' => $input['firstName'],
                'lastName' => $input['lastName'],
                'email' => $input['email'],

                // 'profile_picture' => $imageName,
                'about_me' => $input['about_me'],
                'interests' => $input['interests'],
                // 'socials' => 'nullable|array',
                // 'socials.*.platform' => 'required|string|in:portfolio,github,facebook,twitter,instagram,linkedin,discord,pinterest', // Adjust the allowed platforms as needed
                // 'socials.*.user_input' => 'nullable|string|max:255',
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'email_verified_at' => null,

            // 'profile_picture' => $input['profile_picture'],
            // 'about_me' => $input['about_me'],
            // 'interests' => $input['interests'],
            // 'socials' => 'nullable|array',
            // 'socials.*.platform' => 'required|string|in:portfolio,github,facebook,twitter,instagram,linkedin,discord,pinterest', // Adjust the allowed platforms as needed
            // 'socials.*.user_input' => 'nullable|string|max:255',
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}