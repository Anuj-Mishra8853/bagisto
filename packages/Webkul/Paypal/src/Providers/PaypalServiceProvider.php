<?php

namespace Webkul\Paypal\Providers;

use Illuminate\Support\ServiceProvider;

class PaypalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'paypal');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'paypal');

        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/Config/paymentmethods.php', 'payment_methods'
        );
    }
}
