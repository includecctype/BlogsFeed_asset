<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;                        

class AppServiceProvider extends ServiceProvider
{
    public function boot(){
        if(env('APP_ENV') !== 'local'){
            URL::forceScheme('https');
        }
    }
}
