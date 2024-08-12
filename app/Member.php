<?php

namespace App;

use Dcblogdev\Countries\Facades\Countries;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Member extends Authenticatable
{
    use HasRoles, Notifiable;

    protected $guarded = ['id'];

    // protected $fillable = ['password', 'isadmin', 'remember_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function cloneBranch(Branch $branch)
    {
        $names = explode(' ', $branch->branchname);

        return $branch->members()->updateOrCreate(['email' => $branch->email], [
            'firstname' => $names[0],
            'lastname' => $names[1] ?? '',
            'address' => $branch->address,
            'email' => $branch->email,
            'isadmin' => true,
            'photo' => '',
            'password' => $branch->password,
        ]);
    }

    public function getFullname()
    {
        return "$this->firstname $this->lastname";
    }

    public function InGroup($group_id)
    {

        $count = \App\GroupMember::where('member_id', $this->id)->where('group_id', $group_id)->get()->count();

        return $count > 0;
    }

    public static function getNameById($id)
    {
        return \DB::table('members')->select('firstname', 'lastname')
            ->where('id', $id)->orderby('firstname')->orderBy('lastname')->first();
    }

    public static function getNameByEmail($email)
    {
        if ($std = Member::select('firstname', 'lastname')
            ->where('email', $email)->orderby('firstname')->orderBy('lastname')->first()
        ) {
            $name = $std->firstname . ' ' . $std->lastname;
            return $name;
        }
        return null;
    }

    public static function getPhotoByEmail($email)
    {
        return $std = Member::select('photo')->where('email', $email)->first()->photo;
    }

    public function upgrade()
    {
        $this->member_status = 'old';
        $this->save();
        return $this->getFullname();
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

    public function isAdmin()
    {

        return $this->isadmin;
    }

    public function getName()
    {
        return "$this->firstname $this->lastname";
    }

    public static function toMoney($number)
    {
        $currency = self::getCurrency();
        return $currency->currency_symbol . number_format((float) $number);
    }

    public function getCurrencySymbol()
    {
        return self::getCurrency();
    }

    public function profile()
    {
        return route('member.profile', ['id' => $this->id]); //../member/profile/${id}
    }

    public function groupMember()
    {
        return $this->belongsTo(GroupMember::class);
    }

    public function user()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function member_savings()
    {
        return $this->hasMany(MemberSavings::class);
    }

    public function attendances()
    {
        return $this->hasMany(MemberAttendance::class);
    }

    public function getBranchById($id)
    {
        return \App\Branch::find($id);
    }

    public function getServiceTypes()
    {
        return ServiceType::getTypes();
    }

    public function getCollectionTypes()
    {
        return CollectionsType::getTypes();
    }

    public function group()
    {
        return $this->hasMany(Group::class, 'branch_id', 'branch_id');
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'branch_id', 'branch_id');
    }

    public function option()
    {
        return $this->hasMany(Options::class, 'branch_id', 'branch_id');
    }

    public function collections_types()
    {
        return $this->hasMany(CollectionsType::class, 'branch_id', 'branch_id');
    }

    public function service_type()
    {
        return $this->hasMany(ServiceType::class, 'branch_id', 'branch_id');
    }

    public function collections()
    {
        return $this->hasMany(Collection::class, 'branch_id', 'branch_id');
    }

    public function MemberSavings()
    {
        return $this->hasMany(MemberSavings::class, 'branch_id', 'branch_id');
    }

    public function collections_commissions()
    {
        return $this->hasMany(CollectionCommission::class, 'branch_id', 'branch_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'branch_id', 'branch_id');
    }
}
