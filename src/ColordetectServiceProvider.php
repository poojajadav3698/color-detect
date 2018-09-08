<?php

namespace image\colordetect;

use Illuminate\Support\ServiceProvider;

class ColordetectServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('timezone', function ($app) {
            return new timezone;
        });
    }

    public function boot()
    {
        require __DIR__ . '/routes/web.php';
    }
}