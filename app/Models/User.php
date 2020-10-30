<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Image;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasImage;
use App\Traits\HasMeta;
use App\Traits\Searchable;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, HasApiTokens, Notifiable, HasPermissions, HasRoles, InteractsWithMedia, HasImage, SoftDeletes, HasMeta;

    public function state(){
      return $this->belongsTo(State::class);
    }
    public function country(){
      return $this->belongsTo(Country::class);
    }
    public function memberChurches(){
      return $this->hasManyThrough(Member::class, Church::class);
    }
    public function churches(){
      return $this->hasMany(Church::class);
    }
    public function groupMemberships(){
      return $this->hasManyThrough(GroupMember::class, Member::class);
    }

    public function registerMediaCollections(): void{
      $mimes = ['image/jpeg', 'image/png', 'image/gif'];
      $this->addMediaCollection('avatar')
      ->useFallbackUrl('https://www.pngitem.com/pimgs/m/30-307416_profile-icon-png-image-free-download-searchpng-employee.png')
      ->acceptsMimeTypes($mimes)
      ->singleFile()->useDisk('user_avatars')
      ->registerMediaConversions($this->convertionCallback());
    }

    public function grantMeToken(){
        $token          =  $this->createToken('MyApp');

        return [
          'token'       => $token->plainTextToken,
          'token_type'  => 'Bearer',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
       'email', 'title', 'firstname', 'lastname', 'dob', 'phone_code', 'phone', 'occupation', 'address',
       'country_id', 'state_id', 'city', 'sex', 'marital_status', 'wedding_anniversary', 'password',
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token', 'media'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
     protected $casts = ['email_verified_at' => 'datetime', 'country_id' => 'int', 'state_id' => 'int', 'phone' => 'int'];
     protected $guard_name = ['api'];
}
