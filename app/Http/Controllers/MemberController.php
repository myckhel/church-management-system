<?php

namespace App\Http\Controllers;

use App\Member;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = \Auth::user();
        $members = $user->isAdmin() ? \App\Member::all() : \App\Member::where('branch_id', $user->branchcode)->get();
        //$members = Member::all();
        return view('members.all', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('members.register', compact('classes', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = Member::where('email', $request->email)->get(['id'])->first();
        if($member){

            return redirect()->back()->with('status', "The email ($request->email) already exists for a memeber.");
        }
        $user = \Auth::user();

        $relatives = null;

        // filter $_POST data for keys starting with 'relative'
        // if there's any, then one or more relatives have been assigned
        $array_of_relations_id = array_filter($_POST,
                                function ($key) {
                                    return substr($key,0,8) == 'relative' ? true : false;
                                },
                                ARRAY_FILTER_USE_KEY
                                );


        if (count($array_of_relations_id) > 0) {
            $relatives = [];
            foreach ($array_of_relations_id as $relative_id){

                $relationship = $_POST["relationship_{$relative_id}"];
                array_push($relatives, ['id'=>$relative_id, 'relationship'=>$relationship]);

            }
            $relatives = json_encode($relatives);
        }

        $this->validate($request, [
            'firstname' => 'bail|required|string|max:255',
            'lastname' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dob' => 'required|string|max:255',
            'email' => 'required|string|max:255',


        ]);
        $image_name = 'profile.png'; // default profile image
        if ($request->hasFile('photo'))
        {
            $image = $request->file('photo');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $input['imagename']);

            $image_name = $input['imagename'];
        }

        $member = new Member(array(
            'branch_id' => $user->branchcode,
            'title' => $request->get('title'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'dob' => $request->get('dob'),
            'phone' => $request->get('phone'),
            'occupation' => $request->get('occupation'),
            'position' => $request->get('position'),
            'address' => $request->get('address'),
            'address2' => $request->get('address2'),
            'postal' => $request->get('postal'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'country' => $request->get('country'),
            'sex' => $request->get('sex'),
            'marital_status' => $request->get('marital_status'),
            'member_since' => $request->get('member_since'),
            'wedding_anniversary' => $request->get('wedding_anniversary'),
            'photo' => $image_name,
            'relative' => $relatives
        ));
        $member->save();
        return redirect()->route('member.register.form')->with('status', 'Member Successfully registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member, $id)
    {
        $member = Member::find($id);
        return view('members.profile', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $array = array('id'=>$id);
        Validator::make($array, [
            'id' => 'required|integer|max:10',
        ])->validate();
        $subjects = Subject::all();
        $subject = Subject::whereId($id)->firstOrFail();
        $edit = array('editmode'=>'true');
        $classes = TheClass::all();
        return view('subject.index', compact('subjects', 'subject', 'edit', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        // check if image isnt empty
        if (!empty($request->file('image'))){

            // validate image
            $this->validate($request, [
                'class_id' => 'bail|required|integer|min:1',
                'section_id' => 'required|integer|min:1',

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $image = $request->file('image');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $input['imagename']);

            $image_name = $input['imagename'];


        }

        $member = Member::whereId($id)->firstOrFail();
        $member->class_id = $request->get('class_id');
        $member->section_id = $request->get('section_id');
        $member->firstname = $request->get('firstname');
        $member->lastname = $request->get('lastname');
        //$member->image = $request->get('image');
        $member->mobileno = $request->get('mobileno');
        if (!empty($image_name) && ($image_name!== NULL)) $member->image = $image_name;
        $member->gender = $request->get('gender');
        $member->date_of_birth = $request->get('date_of_birth');
        $member->current_address = $request->get('current_address');
        $member->guardian_is = $request->get('guardian_is');
        $member->father_name = $request->get('father_name');
        $member->father_phone = $request->get('father_phone');
        $member->father_occupation = $request->get('father_occupation');
        $member->mother_name = $request->get('mother_name');
        $member->mother_phone = $request->get('mother_phone');
        $member->mother_occupation = $request->get('mother_occupation');
        $member->guardian_name = $request->get('guardian_name');
        $member->guardian_relation = $request->get('guardian_relation');
        $member->guardian_phone = $request->get('guardian_phone');
        $member->guardian_occupation = $request->get('guardian_occupation');
        $member->guardian_address = $request->get('guardian_address');
        $member->is_active = $request->get('is_active');
        $member->save();
        return redirect(action('MemberController@edit_form', $id))->with('status', 'Member Record Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member, $id)
    {
        //Validator::make(['id'=>$id], [
            //'id' => 'required|integer|max:10',
        //])->validate();
        $member = Member::whereId($id)->firstOrFail();
        $member->delete();
        return redirect()->back()->with('status', 'Member has been deleted!');
    }

    public function getRelative(Request $request, $search_term){

        $user = \Auth::user();

        $sql = 'SELECT * from members WHERE branch_id = '.$user->branchcode.' AND  MATCH (firstname,lastname)
        AGAINST (\''.$search_term.'\')';
        $members = \DB::select($sql);


        return response()->json(['success' => true, "result"=> sizeof($members) > 0 ? $members : ['message'=>'no result found']]);

    }

    public function modify($id){
      $user = \Auth::user();
      $member = Member::whereId($id)->where('branch_id',$user)->first();
      return view('members.edit', compact('member'));
    }
}
