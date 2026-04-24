<?php

use Illuminate\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withCommands()
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('orders:send-progress-reminders')
            ->dailyAt('10:00')
            ->withoutOverlapping();
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/midtrans/notification',
            '/midtrans/notification/custom-order',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
