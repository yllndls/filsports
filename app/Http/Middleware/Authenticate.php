<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('admin.login');


        
        if(!$request->expectJson()) {
            if($request->routeIs('admin.*')) {
                session()->flash('flash','you must login first');
                return route('admin.login');
            }
        }
    }
}
