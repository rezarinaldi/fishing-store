<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        Paginator::useBootstrapThree();
        Blade::directive('currency', function ($expression) {
            return "Rp <?php echo number_format($expression,0,',','.'); ?>";
        });
        // config([
        //     'global' => Setting:all([
        //         'key','value'
        //     ])
        //     ->keyBy('key') // key every setting by its name
        //     ->transform(function ($setting) {
        //          return $setting->value // return only the value
        //     })
        //     ->toArray() // make it an array
        // ]);
    }
}
