<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        /*View::composer(['index','createOffer'],function($view)){
            $view->with('dropdownData',$this->getDropdownData());
        }*/

    }
    /*private function getDropdownData(){

    }*/
}
