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
use DataTables;
use Paystack;
use Dcblogdev\Countries\Facades\Countries;

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
    public function index(Request $request)
    {
      $user = \Auth::user();
      if(!$user->isAdmin()){
        return redirect()->route('dashboard');
      }
      //$members = Member::all();
      if ($request->draw) {
        return DataTables::of(User::all())->make(true);
      } else {
        return view('branch.all');
      }
    }

    public function users(){
      return DataTables::of(User::all())->make(true);
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
        $currencies = Countries::all();

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
      $success = 'Successfully Registered';
      return redirect()->back()->with('status', $success);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'branchname' => 'bail|required|string|max:255',
            'branchcode' => 'required|string|max:255|unique:users',
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
      $branch = User::create([
        'branchname' => $data['branchname'],
        'branchcode' => $data['branchcode'],
        'address' => $data['address'],
        'email' => $data['email'],
        'isadmin' => isset($data['isadmin']) ? $data['isadmin'] : 'false',
        'password' => Hash::make($data['password']),
        'country' => $data['country'],
        'state' => $data['state'],
        'city' => $data['city'],
        'currency' => $data['currency'],
      ]);

      if (!$branch) {
        return $branch;
      }

    }

    public function ho(Request $request){
      $user = \Auth::user();
      $options = \App\head_office_options::all();

      return view('branch.ho', ['options' => $options]);
    }

    public function delete(Request $request){
      $failed = 0;
      $text = "All selected branches were deleted successfully";
      foreach ($request->id as $key => $value) {
        $branch = User::whereId($value)->first();
        if($branch){
          $branch->delete();
        } else {
          $failed++;
          $text = "$failed Operations could not be performed";
        }
      }
      return response()->json(['status' => true, 'text' => $text]);
    }

    public function tools(){
      return view('branch.tools');
    }

    public function options(){
      return view('branch.options');
    }

    public function updateBranch(Request $request){
      $branch = User::whereId($request->id)->first();
      // dd($request);
      if($branch) {
        $errors = [];
        $fields = (array)$request->request;//->parameters;//->ParameterBag->parameters;
        $fields = $fields["\x00*\x00parameters"];
        foreach ($fields as $key => $value) {
          if ($key != 'id' && $key != '_token' && $key != 'action') {
              $branch->$key = $request->$key;
          }
        }
        try {
          $branch->save();
        } catch (\Exception $e) {
          array_push($errors, $e);
          // dd($e);
          return response()->json(['status' => false, 'text' => $e->errorInfo[2]]);
        }
      }
      else {return response()->json(['status' => false, 'text' => "Branch does not exist"]);}
      return response()->json(['status' => true, 'text' => "Branch has been updated!"]);
    }

    public function invoice(Request $request){
      $user = \Auth::user();
      // get due savings
      $dueSavings = \App\CollectionCommission::dueSavings($user);
      // if nothing found for the branch
      // redirect back withErrors
      if(!isset($dueSavings[$user->id])) return back()->withErrors(['message' => 'Nothing to pay']);
      // get the commission percentage
      $percentage = (int)(\App\Options::getLatestCommission())->value;
      // dd($dueSavings);
      $details = \App\Options::getLatestCommissionBankDetails();
      // app logo
      $logo = \App\Setting::findName(['logo']);
      $blanceDue = \App\CollectionCommission::calculateUnsettledCommission();
      return view('branch.invoice', compact('details', 'dueSavings', 'percentage', 'blanceDue', 'user', 'logo'));
    }
}
