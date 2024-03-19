<?php

namespace App\Providers;
use App\Models\setting;
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
        $settings=setting::checkSettings();
        View()->share([
            'setting' => $settings,
        ]);

    }
}
