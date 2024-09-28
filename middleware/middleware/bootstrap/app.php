<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use  App\Http\Middleware\AgeCheck;
use  App\Http\Middleware\CountryCheck; 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {


        //applies to all the routes(globally)
       // $middleware->append(AgeCheck::class);
        
        //this will register the AgeCheck middleware, meaning every request coming into the application will pass through this middleware;

        $middleware->appendToGroup('check1',[
            AgeCheck::class,
            CountryCheck::class,
        ]);


        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
