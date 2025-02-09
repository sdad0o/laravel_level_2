<?php

namespace App\Providers;

use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class SettingsTestProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // This variable will be shared with all views  -- it shold be uniqe to avoide over write 
        $settings = [
            'name' => 'sdad',
            'address'=> 'Amman'
        ];
        // Facades\View::share('settings',$settings); // share data with all views

        // This variable will be shared with specific views
        $myNmae ='sdad';
        Facades\View::composer('welcome',function(View $view)use($myNmae){
            return $view->with('myName', $myNmae);
        });

    }
}
