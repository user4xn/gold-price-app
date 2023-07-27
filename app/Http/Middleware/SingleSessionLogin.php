<?php

namespace App\Http\Middleware;

use App\Models\Session;
use Closure;
use DB;
use Auth;

class SingleSessionLogin
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
