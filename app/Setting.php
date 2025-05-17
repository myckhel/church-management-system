<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Setting extends Model
{
    protected $fillable = ['name', 'value'];

    static function setVersion($versionName, $versionCode)
    {
        static::updateOrCreate(['name' => 'version_name'], ['value' => $versionName, 'name' => 'version_name']);
        static::updateOrCreate(['name' => 'version_code'], ['value' => $versionCode, 'name' => 'version_code']);
    }

    //
    public static function findName(array $names)
    {
        $newNames = [];
        foreach ($names as $name) {
            $setting = self::where('name', $name)->first();
            if ($setting) {
                $newNames[$name] = $setting->value;
            }
        }
        return $newNames;
    }

    public static function uploadLogo(Request $request)
    {
        $image_name = 'logo.png'; // default logo image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $input['imagename'] = $image_name;

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $input['imagename']);

            $image_name = $input['imagename'];

            $setting = self::getOneSetting('logo');

            if (!$setting) {
                $setting = new self();
                $setting->name = 'logo';
            }

            if (Member::count() == 1) {
                $member = Member::first();
                $member->update(['photo' => $image_name]);
            }

            $setting->value = $image_name;
            $setting->save();
            return response()->json(['status' => true,]);
        }
        return response()->json(['status' => false, 'text' => "No photo file"]);
    }

    static function toAssoc(Collection $settings)
    {
        $assoc = [];
        $settings->map(function ($setting) use (&$assoc) {
            $assoc[$setting->name] = $setting->value;
        });

        return $assoc;
    }

    public static function saveAppName(Request $request)
    {
        $name = $request->name;
        if ($name) {
            $setting = self::getOneSetting('name');

            if (!$setting) {
                $setting = new self();
                $setting->name = 'name';
            }

            $setting->value = $name;

            if ($request->hasFile('logo')) {
                self::uploadLogo($request);
            }

            $setting->save();
            return response()->json(['status' => true,]);
        }
        return response()->json(['status' => false, 'text' => "No Name set"]);
    }

    // Relationship
    public static function getOneSetting($name)
    {
        return self::where('name', $name)->first();
    }

    public static function notSet()
    {
        return !self::getOneSetting('logo');
    }
}
