<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DataTables;
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
        if (!$user->isAdmin()) {
            return redirect()->route('dashboard');
        }
        //$members = Member::all();
        if ($request->draw) {
            return DataTables::of(Branch::all())->make(true);
        } else {
            return view('branch.all');
        }
    }

    public function branches()
    {
        return DataTables::of(Branch::all())->make(true);
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
        DB::table('branches')->where('id', '=', $id)->delete();
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
        return Branch::register($request);
    }

    public function ho(Request $request)
    {
        $user = \Auth::user();
        $options = \App\head_office_options::all();

        return view('branch.ho', ['options' => $options]);
    }

    public function delete(Request $request)
    {
        $failed = 0;
        $text = "All selected branches were deleted successfully";
        foreach ($request->id as $key => $value) {
            $branch = Branch::whereId($value)->first();
            if ($branch) {
                $branch->delete();
            } else {
                $failed++;
                $text = "$failed Operations could not be performed";
            }
        }
        return response()->json(['status' => true, 'text' => $text]);
    }

    public function tools()
    {
        return view('branch.tools');
    }

    public function options()
    {
        return view('branch.options');
    }

    public function updateBranch(Request $request)
    {
        $branch = Branch::whereId($request->id)->first();
        // dd($request);
        if ($branch) {
            $errors = [];
            $fields = (array)$request->request; //->parameters;//->ParameterBag->parameters;
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
        } else {
            return response()->json(['status' => false, 'text' => "Branch does not exist"]);
        }
        return response()->json(['status' => true, 'text' => "Branch has been updated!"]);
    }

    public function invoice(Request $request)
    {
        $user = \Auth::user();
        // get due savings
        $dueSavings = \App\CollectionCommission::dueSavings($user);
        // if nothing found for the branch
        // redirect back withErrors
        if (!isset($dueSavings[$user->branch_id])) return back()->withErrors(['message' => 'Nothing to pay']);
        // get the commission percentage
        $percentage = (int)(\App\Options::getLatestCommission())?->value;
        // dd($dueSavings);
        $details = \App\Options::getLatestCommissionBankDetails();
        // app logo
        $logo = \App\Setting::findName(['logo']);
        $blanceDue = \App\CollectionCommission::calculateUnsettledCommission();
        return view('branch.invoice', compact('details', 'dueSavings', 'percentage', 'blanceDue', 'user', 'logo'));
    }
}
