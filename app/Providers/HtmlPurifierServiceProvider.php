<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use HTMLPurifier;
use HTMLPurifier_Config;

class HtmlPurifierServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('purifier', function ($app) {
            $config = HTMLPurifier_Config::createDefault();
            $config->set('HTML.Allowed', 'p,b,a[href],i,u,ul,ol,li,img[src|alt]');
            return new HTMLPurifier($config);
        });
    }
}
