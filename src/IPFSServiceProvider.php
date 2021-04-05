<?php

namespace Rootsoft\IPFS;

use Illuminate\Support\ServiceProvider;
use Rootsoft\IPFS\Clients\IPFSClient;

class IPFSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPublishables();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/ipfs.php', 'ipfs');

        $this->app->singleton('ipfs', function ($app) {
            $baseUrl = config('ipfs.ipfs.base_url', '127.0.0.1');
            $port = config('ipfs.ipfs.port', 5001);

            return new IPFSClient($baseUrl, $port);
        });
    }

    protected function registerPublishables()
    {
        // php artisan vendor:publish --provider="Rootsoft\IPFS\IPFSServiceProvider" --tag="config"
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/ipfs.php' => config_path('ipfs.php'),
            ], 'config');
        }
    }
}
