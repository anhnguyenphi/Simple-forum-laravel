<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormRequest;
use RedirectsUsers;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    // method login
    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(UserFormRequest $request) {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        $user = $request->only('email', 'password');
         if (Auth::attempt($user, $request->has('remember'))) {
            return redirect()->route('articles.index');
        } else {
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
            return redirect()->route('auth.login.get')->withErrors($errors);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('home');
    }

    // method register
    public function getRegister() {
        return view('auth.register');
    }

    public function postRegister(UserFormRequest $request) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));
        return redirect()->route('home');
    }
}
