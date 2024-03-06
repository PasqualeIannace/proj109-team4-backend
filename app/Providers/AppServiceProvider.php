<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'd7s5wffrp2fsx4rh',
                    'publicKey' => 'wjs2prynbgwrqmym',
                    'privateKey' => '1acc920705918b2411dfab7c8dabcddd'
                ]
            );
        });
    }
}
