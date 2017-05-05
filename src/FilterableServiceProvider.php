<?php

namespace SafoorSafdar\Filterable;

use Illuminate\Support\ServiceProvider;

class FilterableServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Filterable');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/filterable'),
        ]);

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/filterable')], 'public');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('filterable', function ($app) {
            return new \SafoorSafdar\Filterable\Filterable($app);
        });
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Filterable',
            'SafoorSafdar\Filterable\Facades\FilterableFacade');
    }
}