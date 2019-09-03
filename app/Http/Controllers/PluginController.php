<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Nwidart\Modules\Facades\Module;

class PluginController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('module.index');
    }

    /**
     * Plugin controlling system
     * @param $action
     * @param $name
     * @return $this
     */
    public function action($action, $name)
    {
        try {
            $module = Module::find($name);
            if ($action == 'enable') {
                $module->enable();
                Artisan::call('module:migrate ' . $name);
                return redirect()->back()->withSuccess($name . " enabled");
            } elseif ($action == 'disable') {
                $module->disable();
                return redirect()->back()->withSuccess($name . " disabled");
            } else {
                $module->delete();
                return redirect()->back()->withSuccess($name . " deleted");
            }

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }


}
