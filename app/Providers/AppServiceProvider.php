<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Visitor;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

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
        View::composer('*', function ($view) {
            // Simpan statistik di cache selama 60 menit
            $visitorStats = Cache::remember('visitor_stats', 60 * 60, function () {
                $today = Visitor::whereDate('created_at', Carbon::today())->count();
                $yesterday = Visitor::whereDate('created_at', Carbon::yesterday())->count();
                $this_week = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $last_week = Visitor::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count();
                $this_month = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
                $last_month = Visitor::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
                $total = Visitor::count();

                return [
                    'today' => $today,
                    'yesterday' => $yesterday,
                    'this_week' => $this_week,
                    'last_week' => $last_week,
                    'this_month' => $this_month,
                    'last_month' => $last_month,
                    'total' => $total,
                ];
            });

            $view->with('visitorStats', $visitorStats);
        });
    }
}
