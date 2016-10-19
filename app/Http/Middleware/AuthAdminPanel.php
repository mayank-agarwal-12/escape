<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Auth\AuthenticationException;

class AuthAdminPanel extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $guard;

    public function __construct(Auth $auth)
    {
        parent::__construct($auth);
        $this->guard = ['adminpanel'];

    }

    public function handle($request, Closure $next,...$guards)
    {
        return $this->authenticate($this->guard);
        //return $next($request);
    }
    protected function authenticate(array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }
        return redirect()->guest('adminpanel/login');

    }

}
