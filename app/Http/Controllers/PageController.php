<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facuz\Theme\Facades\Theme;

class PageController extends Controller
{
    /**
     * Landing page
     *
     * @return mixed
     */
    public function home()
    {

        $themeName = get_settings('theme_name');

        try {

            if ($themeName == "") {

                $theme = Theme::uses('default');

            } else {

                $theme = Theme::uses($themeName);

            }

        } catch (\Exception $exception) {

            $theme = Theme::uses('default');

        }


        $data = ['info' => 'Hello World'];
        $view = "front";

        view($view)->compileShortcodes();

        return $theme->of($view, $data)->render();
    }

    /**
     * Show the front page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function frontPage()
    {
        $themeName = get_settings('theme_name');

        try {

            if ($themeName == "") {
                $theme = Theme::uses('default');
            } else {
                $theme = Theme::uses($themeName);
            }

        } catch (\Exception $exception) {
            $theme = Theme::uses('default');
        }


        return view('pages.front', compact('theme'));

    }

    /**
     * Dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboardPage()
    {
        return view('pages.dashboard');
    }

    /**
     * Front page settings update
     *
     * @param Request $request
     * @return mixed
     */
    public function updateFront(Request $request)
    {
        SettingsController::settingsUpdate($request);

        return redirect()->back()->withSuccess('Successfully updated !');
    }
}
