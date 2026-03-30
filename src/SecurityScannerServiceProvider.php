<?php

namespace Bushra\SecurityScanner;

use Illuminate\Support\ServiceProvider;
use Bushra\SecurityScanner\Console\ScanCommand;

class SecurityScannerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'scanner');

        // Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                ScanCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
