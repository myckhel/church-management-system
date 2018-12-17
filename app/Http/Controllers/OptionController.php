<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;
use Auth;

class OptionController extends Controller
{
    //
    public function getOneBranchOption(Request $request){
      $branch = Auth::user();
      $status = false;
      $text = "Option not found";
      if ($option = Options::getOneBranchOption($request->name, $branch)){ $text = $option; $status = true;}
      return response()->json(['status' => $status, 'text' => $text]);
    }

    public function getBranchOption(){
      $branch = Auth::user();
      $status = false;
      $text = "Option not found";
      if ($option = Options::getBranchOption($branch)){ $text = $option; $status = true;}
      return response()->json(['status' => $status, 'text' => $text]);
    }

    public function putBranchOption(Request $request){
      $branch = Auth::user();
      $status = false;
      $text = "Option Name Not Valid";
      if (in_array($request->name, array('smsapi', 'currency', 'branchname', 'branchaddress', 'branchline1', 'branchline2', 'branchcity', 'branchstate', 'branchcountry', 'branchlogo') ) ){
        // code...
        if ($request->name == 'branchlogo') {
          # code...
          if ($request->hasFile('branchlogo'))
          {
              $image = $request->file('branchlogo');

              $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

              $destinationPath = public_path('/images');

              $image->move($destinationPath, $input['imagename']);

              $request->value = $input['imagename'];
          }
        }

        $text = Options::putBranchOption($request, $branch);
        $text = "Created"; $status = true;
      }
      return response()->json(['status' => $status, 'text' => $text]);
    }

    public function test(){
      $array = [];
      $sql = "SELECT currency_symbol, ID FROM country WHERE currency_name != '' AND currency_symbol != ''";
      $currencies = \DB::select($sql);
      foreach ($currencies as $key => $value) {
        // code...
        array_push($array, $value->currency_symbol);
      }
      return response()->json($array);
    }
}
