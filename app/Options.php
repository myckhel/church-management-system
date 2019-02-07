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

      $options = Options::where('branch_id', $branch->id)->get();
      foreach ($options as $key => $value) {
        if ($value->name == 'collection_commission') {
          $options[$key]->value = (Options::getLatestCommission())->value;
          return $options;
        }
      }

      return $options;
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

    public static function getLatestCommission(){
      return $options = Options::where('name', 'collection_commission')->orderBy('updated_at','desc')->first();
    }

    public function user(){
      $this->belongsTo(User::class);
    }
}
