<?php

//Middleware in Laravel provides a way to filter and manage HTTP requests entering your application. It allows you to examine and modify requests before they reach the controller, as well as responses before they are sent back to the client.

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


   public function handle(Request $request, Closure $next): Response
{ 
    //$request object contains the HTTP request data;
    // Get the 'age' query parameter from the request
    $age = $request->query('age');

    // Check if the 'age' parameter exists and is less than 18
    if ($age && $age < 18) {
        // Return a 403 Forbidden response if age is less than 18
        die("You must be 18 or older to access this content.");
    }

    // If age is 18 or greater, or 'age' is not provided, pass the request to the next middleware or controller

    else{
        echo "You can vote!";
    }
    return $next($request);
}

}
