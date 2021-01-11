<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Church extends Model
{
    use HasRelationships, HasFactory, Searchable, HasMeta;
    protected $fillable = ['user_id', 'church_id', 'name', 'email', 'code', 'country_id', 'state_id', 'city', 'address', 'currency_id'];
    protected $casts    = [];
    protected $searches = [];

    function hasMember($user) {
      return $this->members($user->id ?? $user);
    }

    public function state(){
      return $this->belongsTo(State::class);
    }
    public function country(){
      return $this->belongsTo(Country::class);
    }
    public function currency(){
      return $this->belongsTo(Country::class, 'currency_id');
    }
    public function churches(){
      return $this->hasMany(Church::class);
    }
    public function services(){
      return $this->hasMany(Service::class)
      ->orWhere(fn ($q) =>
        $q->whereIsGlobal(true)->whereRegular(true)
        ->whereHas('church', fn ($q) =>
          $q->whereId($this->church_id)
        )
      );
    }
    public function events(){
      return $this->hasManyThrough(Event::class, Service::class)
      ->orWhere(fn ($q) =>
        $q->whereHas('service', fn ($q) =>
          $q->whereIsGlobal(true)->whereRegular(true)
          ->whereHas('church', fn ($q) =>
            $q->whereId($this->church_id)
          )
        )
      );
    }
    public function attendances(){
      return $this->hasManyDeep(Attendance::class, [Service::class, Event::class])
      ->orWhere(fn ($q) =>
        $q->whereHas('event', fn ($q) =>
          $q->whereHas('service', fn ($q) =>
            $q->whereIsGlobal(true)->whereRegular(true)
            ->whereHas('church', fn ($q) =>
              $q->whereId($this->church_id)
            )
          )
        )
      );
    }
    public function eventGivings(){
      return $this->hasManyDeep(EventGiving::class, [Service::class, Event::class])
      ->orWhere(fn ($q) =>
        $q->whereHas('event', fn ($q) =>
          $q->whereHas('service', fn ($q) =>
            $q->whereIsGlobal(true)->whereRegular(true)
            ->whereHas('church', fn ($q) =>
              $q->whereId($this->church_id)
            )
          )
        )
      );
    }
    public function groups(){
      return $this->hasMany(Group::class);
    }
    public function groupMembers(){
      return $this->hasManyThrough(GroupMember::class, Group::class);
    }
    public function smsMethods($client = null){
      return $this->hasManyThrough(SmsMethod::class, SmsClient::class)
      ->when($client, fn ($q) => $q->whereSmsClientId($client->id ?? $client));
    }
    public function givings(){
      return $this->hasMany(Giving::class)
      ->orWhere(fn ($q) =>
        $q->whereIsGlobal(true)
        ->whereHas('church', fn ($q) =>
          $q->whereId($this->church_id)
        )
      );
    }
    public function members($user_id = null){
      return $this->hasMany(Member::class)
      ->when($user_id, fn ($q) => $q->whereUserId($user_id)->orWhere('id', $user_id));
    }
    public function smsClients(){
      return $this->hasMany(SmsClient::class)
      ->orWhere(fn ($q) =>
        $q->whereIsGlobal(true)
        ->whereHas('church', fn ($q) =>
          $q->whereId($this->church_id)
        )
      );
    }
    public function church(){
      return $this->belongsTo(Church::class, 'church_id');
    }
    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }
}
