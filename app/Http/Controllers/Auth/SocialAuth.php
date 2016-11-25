<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Lib\SocialAccountService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialAuth extends Controller
{
    static $socialLoginArr=NULL;

    public function __construct()
    {
        static::$socialLoginArr = ['facebook','google'];
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        if(in_array($provider,static::$socialLoginArr))
        {
            return Socialite::driver($provider)->redirect();
        }
        return redirect()->to('/login');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request,$provider)
    {
        if(!in_array($provider,static::$socialLoginArr))
        {
            return redirect()->to('/login');
        }
        if($request['error'] == 'access_denied')
        {
            return redirect()->to('/login');
        }
       // $request['code'] = preg_replace('/#_=_/','',$request['code']);
        $service = new SocialAccountService();
        $user = $service->createOrGetUser(Socialite::driver($provider));

        Auth::login($user);
        //auth()->login($user);

        return redirect()->to('/');

    }
}
