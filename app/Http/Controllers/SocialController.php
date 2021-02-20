<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/profile');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                $profile = Profile::create([
                    'text' => "Welcome to your Tap!",
                    'user_id' => $createUser->id
                ]);

                Auth::login($createUser);
                return redirect(route('profile.index'));
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
