<?php

namespace App\Providers;

use App\Models\Pengaturan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Menggunakan View Composer agar $pengaturan otomatis tersedia
     * di semua view tanpa perlu diulang di setiap controller.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('pengaturan', Pengaturan::current());
        });
    }
}
