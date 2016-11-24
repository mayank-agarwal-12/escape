<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class FacebookAuth extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
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
    public function handleProviderCallback(Request $request)
    {
        if($request['error'] == 'access_denied')
        {
            return redirect()->to('/login');
        }
        $user = Socialite::driver('facebook')->user();
      //  print_r($user);die;
        return redirect('/');
        // $user->token;
    }
}
