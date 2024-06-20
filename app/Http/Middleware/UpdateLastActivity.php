<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class UpdateLastActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->last_activity = Carbon::now();
            $user->save();
        }    

        return $next($request);
    }
}
