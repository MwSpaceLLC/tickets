<?php

namespace App\Providers;

use App\Tickets;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if (request()->header('User-Agent') !== 'Symfony') {
            $this->chackSet();
        }

        if (request()->getHost() !== '127.0.0.1' && config('app.ssl')) {
            URL::forceSchema('https');
        }

        // Enable public conf
        $theme = "theme." . config('app.theme');
        $component = "$theme.component";
        $layouts = "$theme.layouts";

        View::share('theme', $theme);
        View::share('layouts', $layouts);
        View::share('component', $component);

        View::share('component', $component);

        Schema::defaultStringLength(191);
    }

    private function chackSet()
    {
        try {
            DB::connection()->getPdo();

        } catch (\Exception $exception) {
            abort(503, $exception->getMessage());

        }

        if (!Schema::hasTable('users')) {
            // Code to create table
            if (!file_exists(base_path('.env'))) {
                abort(503, __('Sistema non installato. Installa tramite Command'));
            }

            abort(503, __('Il sistema presenta malfunzionamenti'));
        }
    }
}
