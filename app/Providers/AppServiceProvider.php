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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Enable pagination
//        if (!Collection::hasMacro('paginate')) {
//
//            Collection::macro('paginate',
//                function ($perPage = 15, $page = null, $options = []) {
//                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//                    return (new LengthAwarePaginator(
//                        $this->forPage($page, $perPage)->values()->all(), $this->count(), $perPage, $page, $options))
//                        ->withPath('');
//                });
//        }

        Schema::defaultStringLength(191);
    }
}
