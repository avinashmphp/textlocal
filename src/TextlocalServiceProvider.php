<?php

namespace Avinashmphp\Textlocal;

use Illuminate\Support\ServiceProvider;

class TextlocalServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/textlocal.php' => config_path('textlocal.php'),
        ],'textlocal');

    }
}