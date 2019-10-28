<?php

namespace Bravoh\Inventory;

use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/Http/routes.php';

        $this->publishes([
            dirname(__DIR__)
            .'/config/config.php' => config_path('inventory-config.php'),
        ], 'inventory-config');

        $this->publishes([
            dirname(__DIR__).'/public' => public_path('vendor/inventory-manager'),
        ], 'inventory-manager');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Bravoh\Inventory\Http\Controllers\InventoryController');
        $this->loadViewsFrom(dirname(__DIR__).'/resources/views', 'inventory');
        $this->loadMigrationsFrom(__DIR__."/Database");
    }
}
