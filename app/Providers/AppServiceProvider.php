<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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

        Validator::extend('phone_number', function($attribute, $value, $parameters)
        {
            return substr($value, 0, 1) == '0';
        });

        Validator::replacer('phone_number', function ($message, $attribute, $rule, $parameters) {
            return "No Tlpn harus diawali dengan 0";
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
        // $this->app->bind('path.public', function() {
        //     return base_path().'/public_html';
        //   });
    }
}
