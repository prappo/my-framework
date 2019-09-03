<?php


if (!function_exists('generateUserImage')) {
    function generateUserImage()
    {
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();

        $img = $avatar->name(\Illuminate\Support\Facades\Auth::user()->name)
            ->length(2)
            ->fontSize(0.5)
            ->size(96)// 48 * 2
            ->background('#ffffff')
            ->color('#1c0c0c')
            ->generate()
            ->stream('data-url');

        return $img;
    }
}
if (!function_exists('isInstalled')) {
    function isInstalled()
    {
        if (file_exists(storage_path('/installed'))) {
            return true;
        }
    }
}
if (!function_exists('generateImage')) {
    function generateImage($text)
    {
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();

        $img = $avatar->name($text)
            ->length(2)
            ->fontSize(0.5)
            ->size(96)// 48 * 2
            ->background('#ffffff')
            ->color('#1c0c0c')
            ->generate()
            ->stream('data-url');

        return $img;
    }
}

if (!function_exists('getSidebarFromPlugin')) {
    function getSidebarFromPlugin()
    {
        $data = [];
        $modules = glob(base_path('Modules/') . "*");
        foreach ($modules as $module) {

                $content = file_get_contents($module . "/module.json");
                $json = json_decode($content, true);
                array_push($data, $json);



        }


        return view('layouts.parts.moduleSidebar', compact('data'));
    }
}


if (!function_exists('getAdminSidebarFromPlugin')) {
    function getAdminSidebarFromPlugin()
    {
        $data = [];
        $modules = glob(base_path('Modules/') . "*");
        foreach ($modules as $module) {

                $content = file_get_contents($module . "/module.json");
                $json = json_decode($content, true);
                array_push($data, $json);



        }


        return view('layouts.parts.moduleAdminSidebar', compact('data'));
    }
}


if (!function_exists('plugins')) {
    function plugins()
    {
        $plugins = [];
        $modules = glob(base_path('Modules/') . "*");
        foreach ($modules as $module) {

                $content = file_get_contents($module . "/module.json");
                $json = json_decode($content, true);
                array_push($plugins, $json);



        }


        return $plugins;
    }
}

if (!function_exists('themes')) {
    function themes()
    {
        $themes = [];
        $modules = glob(public_path('themes/') . "*");
        foreach ($modules as $module) {

                $content = file_get_contents($module . "/theme.json");
                $json = json_decode($content, true);
                array_push($themes, $json);


        }


        return $themes;
    }
}

if (!function_exists('isInstalled')) {

    function isInstalled()
    {
        if (file_exists(storage_path('/installed'))) {
            return true;
        }
    }
}

if (!function_exists('get_settings')) {
    function get_settings($key)
    {
        try {
            return \App\Setting::where('key', $key)->value('value');
        } catch (\Exception $exception) {
            return "";
        }

    }
}

if (!function_exists('languageList')) {
    function languageList()
    {
        $lang = get_settings('languages');
        return explode(',', $lang);
    }
}

if (!function_exists('checkPackage')) {
    function checkPackage($pluginName)
    {

        $type = \App\User::where('id', \Illuminate\Support\Facades\Auth::id())->value('type');

        if ($type == 'admin') {

            return true;

        } else {

            if (
            \App\Subscription::where('userId', \Illuminate\Support\Facades\Auth::id())
                ->where('plugin_name', $pluginName)
                ->exists()
            ) {

                $subscription = \App\Subscription::where('userId', \Illuminate\Support\Facades\Auth::id())
                    ->where('plugin_name', $pluginName)
                    ->first();

                if (\Carbon\Carbon::parse($subscription->expire_date)->greaterThanOrEqualTo(\Carbon\Carbon::today())) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        }
    }
}
