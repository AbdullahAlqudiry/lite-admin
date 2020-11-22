<?php

namespace Alqudiry\LiteAdmin;

use Illuminate\Support\ServiceProvider;

class LiteAdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/app/controllers' => app_path('Http/Controllers'),
            __DIR__.'/app/traits' => app_path('Http/Traits'),
            __DIR__.'/app/models' => app_path('Models'),
            __DIR__.'/database' => database_path('migrations'),
            __DIR__.'/config' => app_path('../config'),
            __DIR__.'/resources' => app_path('../resources'),
            __DIR__.'/public' => public_path('liteadmin'),
        ]);
    }
}