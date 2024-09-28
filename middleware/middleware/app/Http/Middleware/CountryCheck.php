<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "Country check";
        $country = $request->query('country');

        if($country != 'india'){
            die("Access Denied");
        
        }

        else{
            echo "Welcome to the website";
        }

        return $next($request);
    }
}
