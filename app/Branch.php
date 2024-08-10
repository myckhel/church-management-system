<?php

namespace App;

use Cache;
use App\ServiceType;
use App\CollectionsType;
use Dcblogdev\Countries\Facades\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branch extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'branchname', 'branchcode', 'address', 'isadmin', 'city', 'state', 'country', 'currency',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {

        return $this->isadmin;
    }

    public function getName()
    {
        return "$this->branchname";
    }

    public static function getCurrency()
    {
        $curObj;
        $currency = auth()->user()->branch->currency;
        // $currency = self::user()->currency;
        foreach (Countries::all() as $value) {
            if ($value->currency_symbol == $currency) {
                $curObj = $value;
                break;
            }
        }
        return $curObj;
    }

    public function getCurrencySymbol()
    {
        return self::getCurrency();
    }

    public function getServiceTypes()
    {
        return ServiceType::getTypes();
    }

    public function getCollectionTypes()
    {
        return CollectionsType::getTypes();
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function creation()
    {

        return;
    }

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
        if (!Branch::first()) {
            $data['isadmin'] = 'true';
        }
        $data['currency'] = $request->currency;
        $data['password'] = $request->password;
        $data['password_confirmation'] = $request->password_confirmation;

        $validate = self::validator($data);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $branch = self::creator($data);

        self::createMember($branch, $data);
        //
        $success = 'Successfully Registered';
        return redirect()->back()->with('status', $success);
    }

    static function createMember(Branch $branch, $data)
    {
        @[$firstname, $lastname] = explode(' ', $data['branchname']);

        return $branch->members()->create([
            'email' => $data['email'],
            'isadmin' =>  true,
            'password' => Hash::make($data['password']),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'photo' => '',
            'title' => 'Mr',
            'position' => 'senior pastor',
            'sex' => 'male',
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'currency' => $data['currency'],
        ]);
    }

    protected static function validator(array $data)
    {
        return Validator::make($data, [
            'branchname' => 'bail|required|string|max:255',
            'branchcode' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:branches',
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required|string|max:255',
            'state' =>  'required|string|max:255',
            'city' => 'required|string|max:255',
            'currency' => 'required',
        ]);
    }

    protected static function creator(array $data)
    {
        $branch = Branch::create([
            'branchname' => $data['branchname'],
            'branchcode' => $data['branchcode'],
            'address' => $data['address'],
            'email' => $data['email'],
            'isadmin' => isset($data['isadmin']) ? $data['isadmin'] : 'false',
            'password' => '',
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'currency' => $data['currency'],
        ]);

        return $branch;
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'branch_id');
    }

    public function option()
    {
        return $this->hasMany(Options::class);
    }

    public function collections_types()
    {
        return $this->hasMany(CollectionsType::class);
    }

    public function service_types()
    {
        return $this->hasMany(ServiceType::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class, 'branch_id');
    }

    public function MemberSavings()
    {
        return $this->hasMany(MemberSavings::class);
    }

    public function collections_commissions()
    {
        return $this->hasMany(CollectionCommission::class, 'branch_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'branch_id');
    }
}
