<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        view()->composer('frontend.include.header', function ($view){
            $view->with('header', \App\Menu::header());
        });
        
        view()->composer('frontend.include.footer', function ($view){
            $view->with('footer', \App\Menu::footer());
        });
        
        view()->composer('admin.include.sidebar', function ($view){
            $view->with('sidebar', \App\Section::sidebar());
        });
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
