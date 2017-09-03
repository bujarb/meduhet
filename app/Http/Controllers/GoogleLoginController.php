<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;

class GoogleLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $googleuser = Socialite::driver('google')->user();
        $googleuserid = $googleuser->getId();
        $email = $googleuser->email;
        //dd($fbuser);
        $user = User::where('google_user_id',$googleuserid)->orWhere('email',$email)->first();

        if (!$user){
            $user = new User();
            $user->name = $googleuser->getName();
            $user->password = rand(1,1000);
            $user->email = $googleuser->getEmail();
            $user->profilepic = $googleuser->getAvatar();
            $user->google_user_id = $googleuser->getId();
            $user->assignRole('user');
            $user->save();
        }else{
            $user->google_user_id = $googleuserid;
            $user->save();
            Auth::loginUsingId($user->id);
            return redirect()->route('home');
        }
    }
}
