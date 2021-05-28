<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('layouts.master', 'App\Http\ViewComposers\MasterComposer');        
        view()->composer('layouts.sidebar.menu', 'App\Http\ViewComposers\SideBarMenuComposer');

    }
}
