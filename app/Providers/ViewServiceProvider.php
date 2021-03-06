<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use App\View\Composers\SettingsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', SettingsComposer::class);
        View::composer('*', MenuComposer::class);
    }
}
