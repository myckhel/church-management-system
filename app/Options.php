<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
  protected $fillable = [
      'branch_id', 'name', 'value',
  ];
    //
    public static function getOneBranchOption($name, User $branch){
      return Options::where('branch_id', $branch->id)->where('name', $name)->first();
    }

    public static function getBranchOption(User $branch){
      return Options::where('branch_id', $branch->id)->get();
    }

    public static function putBranchOption($request, User $branch){
      if ($option = Options::getOneBranchOption($request->name, $branch)) {
        // code...
        $option->name = $request->name;
        $option->value = $request->value;
        $option->save();
        return $option;
      }
      return Options::create([
        'branch_id' => $branch->id,
        'name' => $request->name,
        'value' => $request->value
      ]);
    }

    public function user(){
      $this->belongsTo(User::class);
    }
}
