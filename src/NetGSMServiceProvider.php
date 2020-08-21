<?php

namespace KumsalAgency\NetGSM;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class NetGSMServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('netgsm', function ($app) {
                return new Channels\NetGSMSmsChannel();
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('kumsalagency-netgsm', NetGSM::class);

        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/netgsm.php', 'netgsm');
        }

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'netgsm');

        $this->registerPublishing();
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../config/netgsm.php' => config_path('netgsm.php'),
        ], 'netgsm-config');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/netgsm'),
        ], 'netgsm-lang');
    }

}