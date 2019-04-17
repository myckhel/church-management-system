<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Branch extends Authenticatable
{
    protected $guarded = ['id'];

    protected $guard = 'branch';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function register(Request $request)
    {
      $data = [];
      $data['branchname'] = $request->branchname;
      $data['branchcode'] = $request->branchcode;
      $data['address'] = $request->address;
      $data['email'] = $request->email;
      $data['country'] = $request->country;
      $data['state'] = $request->state;
      $data['city'] = $request->city;
      if (!User::first()) {
        $data['isadmin'] = true;
      }
      $data['currency'] = $request->currency;
      $data['password'] = $request->password;
      $data['password_confirmation'] = $request->password_confirmation;

      $validate = self::validator($data);
      if($validate->fails()){
        return redirect()->back()->withErrors($validate)->withInput();
      }
      $creation = self::creator($data);
      //
      $s = 'Successfully Registered';
      return redirect()->back()->with('s');
    }

    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'branchname' => 'bail|required|string|max:255',
            'branchcode' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required|string|max:255',
            'state' =>  'required|string|max:255',
            'city' => 'required|string|max:255',
            'currency' => 'required',
        ]);
    }

    protected static function creator(array $data)
    {
      $branch = User::create([
        'branchname' => $data['branchname'],
        'branchcode' => $data['branchcode'],
        'address' => $data['address'],
        'email' => $data['email'],
        'isadmin' => $data['isadmin'] ? $data['isadmin'] : false,
        'password' => Hash::make($data['password']),
        'country' => $data['country'],
        'state' => $data['state'],
        'city' => $data['city'],
        'currency' => $data['currency'],
      ]);

      return $branch;

    }
}
