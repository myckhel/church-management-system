<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    function regForm() {
      return inertia('Auth/Login');
    }

    public function register(Request $request)
    {
      $path     = $request->getPathInfo();
      $is_admin = $path == '/api/admin/register';
      $model    = $is_admin ? 'admins' : 'users';
      $request->validate([
          'email'               => "required|email|unique:$model",
          'password'            => 'required|min:6|confirmed',
          'avatar'              => '',
      ], [
          'password.confirmed'  => 'The password does not match.'
      ]);

      $avatar = $request->avatar;

      $user = $is_admin ? $this->createAdmin(array_filter($request->all())) : $this->create(array_filter($request->all()));
      ($user && $avatar) && $user->saveImage($avatar, 'avatar');
      try {
        // $user->notify(new SignupActivate($user));
      } catch (\Exception $e) {
        // $user->active = 1;
        // $user->save();
      }

      if (!$request->wantsJson()) {
        auth('web')->attempt($request->only(['password', 'email']));
        return redirect('/home');
      }

      $token       = $user->grantMeToken();
      // if ($request->remember_me)
      //     $token['instance']->expires_at = Carbon::now()->addWeeks(1);

      return response()->json([
          'message'     => 'Successfully created user!',
          'user'        => $user,
          'token'       => $token['token'],
          'token_type'  => $token['token_type'],
          // 'expires_at'  => $token['expires_at'],
      ], 201);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createAdmin(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
