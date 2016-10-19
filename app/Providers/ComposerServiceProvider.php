<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
define('ADMINPATH','/../../vendor/iron-summit-media/startbootstrap-sb-admin-2/');

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->loadViewsFrom(__DIR__.ADMINPATH.'/pages/', 'iron-summit-media');

        $this->publishes([
            __DIR__.ADMINPATH.'/pages/' => resource_path('views/vendor/iron-summit-media'),
        ]);

        $this->publishes([
            __DIR__.ADMINPATH.'/bower_components/' => public_path('vendor/iron-summit-media/bower_components'),
        ], 'public');
        $this->publishes([
            __DIR__.ADMINPATH.'/dist/' => public_path('vendor/iron-summit-media/dist'),
        ], 'public');
        $this->publishes([
            __DIR__.ADMINPATH.'/js/' => public_path('vendor/iron-summit-media/js'),
        ], 'public');




    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
