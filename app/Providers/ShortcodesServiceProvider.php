<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Gornymedia\Shortcodes\Facades\Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::add('example', function ($atts, $content, $name) {
            $a = Shortcode::atts([
                'name' => $name,
                'foo' => 'something',
            ], $atts);

            return "foo = {$a['foo']}";
        });

        Shortcode::add('notice', function ($attr, $content, $name) {
            $a = Shortcode::atts([
                'design' => 'success',
                'text' => '',
            ], $attr);

            return view('widgets.parts.notice', $a);


        });

        Shortcode::add('row', function ($atts, $content, $name) {
            $content = Shortcode::compile($content);

            return "<div class='row'>$content</div>";
        });

        Shortcode::add('column', function ($atts, $content, $name) {
            $content = Shortcode::compile($content);

            return "<div class='col'>$content</div>";
        });

        Shortcode::add('login', function ($atts, $content, $name) {
            return view('widgets.parts.login');
        });

        Shortcode::add('registration', function ($attr, $content, $name) {
            return view('widgets.parts.registration');
        });

        Shortcode::add('packages', function ($attr, $content, $name) {
            return view('widgets.parts.packages');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


}
