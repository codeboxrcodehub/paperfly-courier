<?php

namespace Codeboxr\PaperflyCourier;

use Illuminate\Support\ServiceProvider;
use Codeboxr\PaperflyCourier\Apis\AreaApi;
use Codeboxr\PaperflyCourier\Manage\Manage;
use Codeboxr\PaperflyCourier\Apis\StoreApi;
use Codeboxr\PaperflyCourier\Apis\OrderApi;

class PaperflyCourierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../config/paperfly.php" => config_path("paperfly.php")
        ]);
    }

    /**
     * Register application services
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/paperfly.php", "paperfly");

        $this->app->bind("paperfly", function () {
            return new Manage(new AreaApi(), new StoreApi(), new OrderApi());
        });
    }

}
