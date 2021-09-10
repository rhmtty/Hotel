<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        // setlocale(LC_TIME, 'id_ID');
        // // \Carbon\Carbon::setLocale('ID');
        // // // jika ingin menyesuaikan dengan dengan locale di laravel
        // // \Carbon\Carbon::setLocale(config('app.locale'));
        // // config(['app.locale' => 'id']);
        // // \Carbon\Carbon::setLocale('id');
        // //  Schema::defaultStringLength(191);

        // // setlocale(LC_ALL, 'id_ID.utf8');
        // Carbon::setLocale('id');
        // \Carbon\Carbon::setLocale(config('app.locale'));
            
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
