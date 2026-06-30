<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            // Configure rate limiters
            Illuminate\Support\Facades\RateLimiter::for('login', function (Illuminate\Http\Request $request) {
                return Illuminate\Cache\RateLimiting\Limit::perMinute(5)->by($request->ip());
            });

            Illuminate\Support\Facades\RateLimiter::for('register', function (Illuminate\Http\Request $request) {
                return Illuminate\Cache\RateLimiting\Limit::perMinute(3)->by($request->ip());
            });

            Illuminate\Support\Facades\RateLimiter::for('contact', function (Illuminate\Http\Request $request) {
                return Illuminate\Cache\RateLimiting\Limit::perMinute(2)->by($request->ip());
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Add secure headers middleware globally
        $middleware->append(\App\Http\Middleware\SecureHeaders::class);

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'agent.approved' => \App\Http\Middleware\EnsureAgentIsApproved::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn(Request $request) => $request->is('api/*'),
        );
    })->create();
