<?php

namespace App\Providers;

use App\View\Composers\ChannelsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Options 1 - Make "channels" available everywhere
        // View::share('channels', Channel::orderBy('name')->get());

        // Options 2 - Make "channels" available on specific pages
        // View::composer(['posts.*', 'channels.index'], function ($view) {
        //     $view->with('channels', Channel::orderBy('name')->get());
        // });

        // Options 3 - Dedicated class for "channels" variable
        View::composer('partials.channels.*', ChannelsComposer::class);
    }
}
