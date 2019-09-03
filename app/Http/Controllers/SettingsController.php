<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function home()
    {
        return view('settings.index');
    }

    public function env()
    {
        return view('settings.env');
    }

    public function backup()
    {
        return view('settings.backup');
    }

    public function menu()
    {

        return view('settings.menu');
    }

    public function set($key, $value)
    {

        if (Setting::where('key', $key)->exists()) {

            Setting::where('key', $key)->update([
                'value' => $value
            ]);

        } else {

            $settings = new Setting();
            $settings->key = $key;
            $settings->value = $value;
            $settings->save();

        }
    }

    public static function setS($key, $value)
    {

        if (Setting::where('key', $key)->exists()) {

            Setting::where('key', $key)->update([
                'value' => $value
            ]);

        } else {

            $settings = new Setting();
            $settings->key = $key;
            $settings->value = $value;
            $settings->save();

        }
    }

    public function get($key)
    {
        return Setting::where('key', $key)->value('value');
    }

    public function update(Request $request)
    {
        foreach ($request->toArray() as $key => $value) {
            if ($key != '_token') {
                $this->set($key, $value);
            }
        }

        return redirect()->back()->withSuccess('Successfully updated !');
    }

    public static function settingsUpdate($request)
    {
        foreach ($request->toArray() as $key => $value) {
            if ($key != '_token') {
                self::setS($key, $value);
            }
        }


    }


}
