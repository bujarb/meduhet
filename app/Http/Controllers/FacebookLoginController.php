<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;

class FacebookLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $fbuser = Socialite::driver('facebook')->user();
        $fb_user_id = $fbuser->getId();
        //dd($fbuser);
        $user = User::where('facebook_user_id',$fb_user_id)->first();

        if (!$user){
            $user = new User();
            $user->name = $fbuser->getName();
            $user->password = rand(1,1000);
            $user->email = $fbuser->getEmail();
            $user->profilepic = $fbuser->getAvatar();
            $user->facebook_user_id = $fbuser->getId();
            $user->save();
        };

        Auth::loginUsingId($user->id);
        return redirect()->route('home');
    }
}
