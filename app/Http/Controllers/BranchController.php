<?php

namespace App\Http\Controllers;

use App\Branch;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\H_O_Options;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;

class BranchController extends Controller
{
    private $user;

    public function __construct()
    {
      $this->user = \Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select()->join('country', 'country.ID', '=', 'users.currency')->get();
        $user = \Auth::user();
        return ($user->isAdmin()) ? view('branch.all',compact('users')) : redirect()->route('dashboard');//\Gate::denies('view-branches', $this->user) ? redirect()->route('dashboard') : view('branch.all',compact('users'));
    }

    public function users(){
      return Datatables::of(User::all())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        $user = \Auth::user();
        DB::table('users')->where('id', '=', $id)->delete();
         return response()->json(['success' => true,]);
    }

    public function registerForm()
    {
        //
        $user = \Auth::user();

        $sql = "SELECT currency_name, currency_symbol, ID FROM country WHERE currency_name != ''";
        $currencies = \DB::select($sql);

        return ($user->isAdmin()) ? view('branch.register', compact('currencies')) : redirect()->route('dashboard');
    }



    public function register(Request $request)
    {
      $data = [];
      $data['branchname'] = $request->branchname;
      $data['branchcode'] = $request->branchcode;
      $data['address'] = $request->address;
      $data['email'] = $request->email;
      $data['country'] = $request->country;
      $data['state'] = $request->state;
      $data['city'] = $request->city;
      $data['currency'] = $request->currency;
      $data['password'] = $request->password;
      $data['password_confirmation'] = $request->password_confirmation;
      //foreach($request as $key => $value){
        //$data[$key] = $value;
      //}
      //return $data['branchname'];
        $validate = self::validator($data);
        if($validate->fails()){
          return redirect('/branches/register')->withErrors($validate)->withInput();
        }
        $creation = self::creator($data);
        //
        //$users = User::all();

        $s = 'Success';

        //return \Gate::denies('view-branches', $this->user) ? redirect()->route('dashboard'):
        return redirect()->route('branch.register', ['s' => $s]);
    }

    protected function validator(array $data)
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

    protected function creator(array $data)
    {
        return User::create([
            'branchname' => $data['branchname'],
            'branchcode' => $data['branchcode'],
            'address' => $data['address'],
            'email' => $data['email'],
            'isadmin' => 'false',
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'currency' => $data['currency'],
        ]);
    }

    public function ho(Request $request){
        $user = \Auth::user();

        //foreach($request as $key => $value){

        //}
        //$options = DB::table('head_office_options')->get();
        $options = \App\head_office_options::all();
        //$op = new H_O_Options();
        //$options = $op->options();//H_O_Options::options();
        return view('branch.ho', ['options' => $options]);
    }
    public function ho_up(Request $request){
      if(Input::file('img')){
        $img = file_get_contents(Input::file('img')->getRealPath());
      }
        $user = \Auth::user();
        $sname = $request->sname;
        $lname = $request->lname;
        $addr1 = $request->addr1;
        $addr2 = $request->addr2;
        $city = $request->city;
        $state = $request->state;
        $postal = $request->postal;
        $country = $request->country;
        $phone1 = $request->phone1;
        $phone2 = $request->phone2;
        $phone3 = $request->phone3;
        $phone4 = $request->phone4;
        $email  = $request->email;
        //$img = $request->img;
        $id = $request->id;
        $data = ['HOSNAME'=>$sname,
                 'HOLNAME'=>$lname,
                 'HOADDRESS'=>$addr1,
                 'HOADDRESS2'=>$addr2,
                 'HOCITY'=>$city,
                 'HOSTATE'=>$state,
                 'HOPOSTAL_CODE'=>$postal,
                 'HOCOUNTRY'=>$country,
                 'HOPHONE1'=>$phone1,
                 'HOPHONE2'=>$phone2,
                 'HOPHONE3'=>$phone3,
                 'HOPHONE4'=>$phone4,
                 'HOEMAIL'=>$email,
                 ];
                 if(isset($img)){
                  $data['HOLOGO'] = $img;
                 }
        DB::table('head_office_options')->where('HOID', $id)->update($data);

        //foreach($request as $key => $value){

        //}
        //$success =
        //DB::table('head_office_options')->where($options->column, $options->column)->update([$options->column => $options->value]);

        return redirect('/branches/head_office_options');
    }

    public function tools(){
      return view('branch.tools');
    }

    public function options(){
      return view('branch.options');
    }
}
