<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 7/31/2017
 * Time: 2:15 AM
 */

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ProfileComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        $this->app->view->composer(
            '*', ProfileComposer::class
        );

        /*// Using Closure based composers...
        View::composer('dashboard', function ($view) {
            //
        });*/
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}