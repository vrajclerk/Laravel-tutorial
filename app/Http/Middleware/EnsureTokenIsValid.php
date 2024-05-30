<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\component\httpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next):Response
    {
    if($request->input('token') !== 'my-secret-token')
    {
        return redirect('home');
       
}
return $next($request);
}
}
class BeforeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Perform action
 
        return $next($request);
    }
}
class AfterMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
 
        // Perform action
 
        return $response;
    }
}