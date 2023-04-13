<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\LoginNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
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

    use AuthenticatesUsers, Notifiable;

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
    protected function authenticated(Request $request, $user)
    {
        $errors = [$this->username() => trans('auth.failed')];
        $username = $this->username();
        $credentials = request()->only($username, 'password');
        // dd($credentials);
        if ((auth()->user()->position != strtolower($credentials[$username])) && $credentials[$username] != strtolower($credentials[$username])) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'invalid credentials!');
        } else {
        }
        if ($user->hasRole('administrator')) {
            $user->notify(new LoginNotification());
            return redirect()->route('admin_ui');
        }
        if ($user->hasRole('user')) {
            $user->notify(new LoginNotification());
            return redirect()->route('user_ui');
        }
    }
}
