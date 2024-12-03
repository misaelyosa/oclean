<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permission): Response
    {
        // dd(Auth::user()->role);
        if (Auth::user() !== null){
            $role_id = Auth::user()->role;
            $role = Roles::where('id', $role_id)->value('role');
            // dd($role);

            $permissions = array_map('trim', array_map('strtolower', $permission));
            // dd($role, $permissions);
            if(in_array($role,  $permissions))
                return $next($request);
            else
            abort(403);
        }
        else{
            return redirect()->route('login.index');
        }
    }
}
