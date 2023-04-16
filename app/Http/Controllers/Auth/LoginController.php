<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request): array
    {
        return array_merge($request->only($this->username(), 'password'), ['approved' => 1]);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && !$user->approved) {
            throw ValidationException::withMessages([
                $this->username() => ['not_approved' => 'Your account has not been approved yet. Please wait for approval.',
                ],
            ]);
        }
        throw ValidationException::withMessages([
            $this->username() => ["message" => 'Authentication Failure'],
        ]);
    }

}
