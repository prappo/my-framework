<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists, this
    | is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities this is cool
    | feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        'before' => function ($theme) {
            $theme->setTitle('');
            $theme->setAuthor('');
        },

        'asset' => function ($asset) {
            $asset->themePath()->add([
                ['style', array(
                    'vendor/nucleo/css/nucleo.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'css/argon.css',
                )],
                ['script', array(
                    'vendor/jquery/jquery.min.js',
                    'vendor/popper/popper.min.js',
                    'vendor/bootstrap/bootstrap.min.js',
                    'vendor/headroom/headroom.min.js',
                    'js/argon.js',

                )]
            ]);

            // You may use elixir to concat styles and scripts.
            /*
            $asset->themePath()->add([
                                        ['styles', 'dist/css/styles.css'],
                                        ['scripts', 'dist/js/scripts.js']
                                     ]);
            */

            // Or you may use this event to set up your assets.
            /*
            $asset->themePath()->add('core', 'core.js');
            $asset->add([
                            ['jquery', 'vendor/jquery/jquery.min.js'],
                            ['jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', ['jquery']]
                        ]);
            */
        },


        'beforeRenderTheme' => function ($theme) {
            // To render partial composer
            /*
            $theme->partialComposer('header', function($view){
                $view->with('auth', Auth::user());
            });
            */

        },

        'beforeRenderLayout' => array(

            'mobile' => function ($theme) {
                // $theme->asset()->themePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);