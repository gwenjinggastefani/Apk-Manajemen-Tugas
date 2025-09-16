<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->role !== $role) {
            return redirect()->route('tasks.index')->with('error', 'Akses ditolak.');
        }
        return $next($request);
    }
}
