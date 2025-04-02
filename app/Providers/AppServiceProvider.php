<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Faq;
use App\Models\Game;
use Illuminate\Support\Facades\View;

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
        View::composer('site-user.components.faq', function ($view) {
            $faqs = Faq::orderBy('created_at', 'asc')->get();
            $view->with('faqs', $faqs);
        });

        View::composer('site-user.components.footer', function ($view) {
            $boostingServices = Game::has('boostingServices')
                ->orderBy('updated_at', 'desc')
                ->take(3)
                ->get();
            $view->with('boostingServices', $boostingServices);
        });
    }
}
