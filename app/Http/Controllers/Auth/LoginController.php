<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

      function redirectTo()
    {

    if(Auth::user()->hasRole('admin')){
        $this->redirectTo = route('admin.dashboard');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('superadmin')){
        $this->redirectTo = route('superadmin.users.index');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('author')){
        $this->redirectTo = route('freelancer.dashboard');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('officer')){
        $this->redirectTo = route('officer.officers.index');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('teammate')){
        $this->redirectTo = route('teammate');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('salesperson')){
        $this->redirectTo = route('salesperson.dashboard');
        return $this->redirectTo;
    }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
