<?php

namespace App\Models;

use App\Traits\HasMeta;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\File;
use Spatie\Image\Image;
use App\Traits\HasImage;

class Group extends Model implements HasMedia
{
    use HasFactory, Searchable, HasMeta, HasImage, InteractsWithMedia;
    protected $fillable = ['church_id', 'name'];
    protected $casts    = ['church_id' => 'int'];
    protected $searches = [];
    protected $hidden   = ['media'];

    public function church(){
      return $this->belongsTo(Church::class);
    }
    public function members(){
      return $this->hasMany(GroupMember::class);
    }

    public function registerMediaCollections(): void{
      $mimes = ['image/jpeg', 'image/png', 'image/gif'];
      $this->addMediaCollection('avatar')
      ->useFallbackUrl('https://www.pngitem.com/pimgs/m/30-307416_profile-icon-png-image-free-download-searchpng-employee.png')
      ->acceptsMimeTypes($mimes)
      ->singleFile()->useDisk('group_avatars')
      ->registerMediaConversions($this->convertionCallback());
    }
}
