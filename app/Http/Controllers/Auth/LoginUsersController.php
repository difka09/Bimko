<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class LoginUsersController extends Controller
{


    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        return 'identity';
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.wronguser')],
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('Murid')) {
            return redirect()->route('guest.createfeed');
        }
        elseif($user->hasRole('Guru')) {
            return redirect()->route('guest.createfeed');
        }
    }
}
