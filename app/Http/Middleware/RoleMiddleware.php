<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (! $request->user() || ! $request->user()->hasRole($role)) {
            throw UnauthorizedException::forRoles([$role]);
        }

        return $next($request);
    }
}
