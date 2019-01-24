<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;
use Auth;
use Yajra\Datatables\Datatables;

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
      if (in_array($request->name, array('smsbalanceapi', 'smsapi', 'currency', 'branchname', 'branchaddress', 'branchline1', 'branchline2', 'branchcity', 'branchstate', 'branchcountry', 'branchlogo') ) ){
        // code...
        if (isset($request->branchlogo)) {
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

    public function toolsPost(Request $request){
      $status = false;
      $text = "Action Not Valid";
      $branch_id = Auth::user()->id;
      if (isset($request->c_type_c)) {
        # code...
        \App\CollectionsType::create(['name' => \App\CollectionsType::formatString($request->name), 'branch_id' => $branch_id]);
        $status = true;
        $text = "Created";
      } elseif(isset($request->s_type_c)) {
        # code...
        \App\ServiceType::create(['name' => $request->name, 'branch_id' => $branch_id]);
        $status = true;
        $text = "Created";
      }
      return response()->json(['status' => $status, 'text' => $text]);
    }

    public function optionsPost(){
      return response()->json(['status' => true]);
    }

    public function getCurrencies(Request $request){
      $sql = "SELECT currency_symbol, ID FROM country WHERE currency_name != '' AND currency_symbol != ''";
      $currencies = \DB::select($sql);
      if ($request->_) {
        $array = [];
        foreach ($currencies as $key => $value) {
          // code...
          array_push($array, $value->currency_symbol);
        }
        return response()->json($array);
      }
      return response()->json($currencies);
    }

    public function getCountries(Request $request){
      $sql = "SELECT name, ID FROM country";
      $currencies = \DB::select($sql);
      if ($request->_) {
        $array = [];
        foreach ($currencies as $key => $value) {
          // code...
          array_push($array, $value->currency_symbol);
        }
        return response()->json($array);
      }
      return response()->json($currencies);
    }

    public function collectionTypeGet(Request $request){
      $branch_id = Auth::user()->id;
      $types = \App\CollectionsType::all();
      return Datatables::of($types)->make(true);
    }

    public function serviceTypeGet(Request $request){
      $branch_id = Auth::user()->id;
      $types = \App\ServiceType::all();
      return Datatables::of($types)->make(true);
    }

    public function deleteCollectionType(Request $request){
      $collection = \App\CollectionsType::whereId($request->id)->first();
      if($collection) $collection->delete(); else return response()->json(['status' => false, 'text' => "Collection does not exist"]);
      return response()->json(['status' => true, 'text' => "$collection->name has been deleted!"]);
    }

    public function deleteServiceType(Request $request){
      $service = \App\ServiceType::whereId($request->id)->first();
      if($service) $service->delete(); else return response()->json(['status' => false, 'text' => "Service does not exist"]);
      return response()->json(['status' => true, 'text' => "$service->name has been deleted!"]);
    }

    public function updateServiceType(Request $request){
      $service = \App\ServiceType::whereId($request->id)->first();
      if($service) { $service->name = $request->name; $service->save();}
      else {return response()->json(['status' => false, 'text' => "Service does not exist"]);}
      return response()->json(['status' => true, 'text' => "service has been updated!"]);
    }

    public function updateCollectionType(Request $request){
      $collection = \App\CollectionsType::whereId($request->id)->first();
      if($collection) { $collection->name = \App\CollectionsType::formatString($request->name); $collection->save();}
      else {return response()->json(['status' => false, 'text' => "collection does not exist"]);}
      return response()->json(['status' => true, 'text' => "collection has been updated!"]);
    }
}
