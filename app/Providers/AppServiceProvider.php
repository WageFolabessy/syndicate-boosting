<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Faq;
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
    }
}
