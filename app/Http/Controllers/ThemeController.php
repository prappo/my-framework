<?php

namespace App\Http\Controllers;

use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Theme home page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('theme.index');
    }

    /**
     * Preview theme
     * @param $name
     * @return mixed
     */
    public function preview($name)
    {
        $theme = Theme::uses($name);
        $data = ['info' => 'info'];
        $view = "theme.preview";
        view($view)->compileShortcodes();
        return $theme->of($view, $data)->render();
    }

    /**
     * Settings page of theme
     * @param $name
     * @return mixed
     */
    public function settings($name)
    {
        $theme = Theme::uses($name);
        $view = "settings";
        return $theme->scope($view)->render();
    }

    /**
     * Active theme for landing page
     * @param $themeName
     * @return mixed
     */
    public function active($themeName)
    {

        SettingsController::setS('theme_name', $themeName);
        return redirect()->back()->withSuccess('Activated !');

    }
}
