<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHelpers();
    }

    /**
     * Load helper functions.
     *
     * @return void
     */
    protected function loadHelpers()
    {
        foreach (glob(app_path('Helpers') . '/*.php') as $file) {
            require_once $file;
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
