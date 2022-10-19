<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if (config('app.env') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        Validator::extend('phone_number', function($attribute, $value, $parameters)
        {
            return substr($value, 0, 1) == '0';
        });

        Validator::replacer('phone_number', function ($message, $attribute, $rule, $parameters) {
            return "No Tlpn harus diawali dengan 0";
        });

        Validator::extend('format_rp', function($attribute, $value, $parameters)
        {
            if ( $value == "" ) return true ; 
            $ex = explode("Rp. ",$value);
            if ( count($ex) == 2 )
            {
                $int = (int)$ex[1] ;
                if ( $int > 0 )
                {
                    return true ; 
                }
                else
                {
                    return false ; 
                }    
            }
            else
            {
                return false ; 
            }
            
        });

        Validator::replacer('format_rp', function ($message, $attribute, $rule, $parameters) {
            return $attribute." : Format rupiah tidak sesuai";
        });

        Blade::directive('currency', function ( $expression ) { 
            return "Rp. <?php echo number_format((float)$expression,0,',','.'); ?>"; 
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
