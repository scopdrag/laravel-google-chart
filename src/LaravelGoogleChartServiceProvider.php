<?php

namespace Scopdrag\LaravelGoogleChart;

use Illuminate\Support\ServiceProvider;

class LaravelGoogleChartServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'LaravelGoogleChart');
        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/LaravelGoogleChart'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {


        $this->app->bind('Scopdrag\LaravelGoogleChart\Contracts\Factory', function() {
            return new ChartManager();
        });

        $className='ChartManager';
        $this->app->booting(function() use($className) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias($className, 'Scopdrag\LaravelGoogleChart\Facades\ChartFacade');
        });

    }

    public function provides() {
        return ['Scopdrag\LaravelGoogleChart\Contracts\Factory'];
    }

}
