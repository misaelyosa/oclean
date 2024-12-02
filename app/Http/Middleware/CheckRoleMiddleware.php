<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permission): Response
    {
        if (Auth::user() !== null){
            for($i = 0; $i<4; $i++){
                $role = trim(strtolower(Auth::user()->roles[$i]->role));
                $permissions = array_map('trim', array_map('strtolower', $permission));

                // dd($role, $permissions);
                if(in_array($role,  $permissions))
                    return $next($request);
                else
                abort(403);
            }
        }
        else{
            return redirect()->route('login.index');
        }
    }
}
