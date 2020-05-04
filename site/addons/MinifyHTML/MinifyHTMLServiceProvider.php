<?php

namespace Statamic\Addons\MinifyHTML;

use Statamic\Extend\ServiceProvider;

class MinifyHTMLServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
        $kernel->pushMiddleware('Statamic\Addons\MinifyHTML\MinifyHTMLMiddleware');

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
