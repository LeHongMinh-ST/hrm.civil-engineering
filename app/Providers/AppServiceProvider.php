<?php
declare(strict_types=1);

namespace App\Providers;

use App\Models\Worker;
use App\Observers\WorkerObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

/**
 * @class AppServiceProvider
 */
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
     */
    public function boot(): void
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
//        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        Worker::observe(WorkerObserver::class);
    }
}
