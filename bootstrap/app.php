<?php

use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function ($exceptions) {
        $exceptions->render(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        });

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, $request) {
            return response()->json(['message' => $e->getMessage()], $e->getStatusCode());
        });

        $exceptions->render(function (\Throwable $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Internal Server Error',
                    'error' => $e->getMessage()
                ], 500);
            }

            return null; // fallback ke default handler (HTML)
        });
    })
    ->create();
