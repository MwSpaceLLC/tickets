<?php

namespace App\Providers;

use App\Tickets;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Enable public conf
        $theme = "theme." . config('app.theme');
        $component = "$theme.component";
        $layouts = "$theme.layouts";

        View::share('theme', $theme);
        View::share('layouts', $layouts);
        View::share('component', $component);

        Schema::defaultStringLength(191);
    }
}
