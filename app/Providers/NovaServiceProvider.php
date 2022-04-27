<?php

namespace App\Providers;

use App\Nova\Ad;
use App\Nova\Article;
use App\Nova\Banner;
use App\Nova\ContactRequest;
use App\Nova\Contributor;
use App\Nova\Donor;
use App\Nova\Guide;
use App\Nova\Menu;
use App\Nova\News;
use App\Nova\Photographer;
use App\Nova\Recipe;
use App\Nova\Setting;
use App\Nova\Sponsor;
use App\Nova\Subscription;
use App\Nova\Team;
use App\Nova\Translator;
use App\Nova\User;
use DigitalCreative\CollapsibleResourceManager\CollapsibleResourceManager;
use DigitalCreative\CollapsibleResourceManager\Resources\TopLevelResource;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \OptimistDigital\NovaPageManager\NovaPageManager,
            new CollapsibleResourceManager([
                'disable_default_resource_manager' => true, // default
                'remember_menu_state' => true, // default
                'navigation' => [
                    TopLevelResource::make([
                        'label' => 'General',
                        'resources' => [
                            Menu::class,
                            User::class,
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Resources',
                        'resources' => [
                            Ad::class,
                            Banner::class,
                            Article::class,
                            News::class,
                            Recipe::class,
                            Guide::class,
                            Setting::class,
                            Subscription::class,
                            ContactRequest::class,
                        ]
                    ]),
                    TopLevelResource::make([
                        'icon' => null,
                        'label' => 'About',
                        'expanded' => false,
                        'resources' => [
                            Team::class,
                            Contributor::class,
                            Translator::class,
                            Photographer::class,
                            Donor::class,
                            Sponsor::class,
                        ]
                    ]),
            ]])
        ];
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
