<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(auth()->check() && (auth()->user()->is_active == 'Y')){
        //     Auth::logout();
        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();
        //     return redirect()->route('login')->with('error', 'Akun Dinonaktifkan, Silahkan kontak Admin.');
        // }

        if (Auth::check() && Auth::user()->is_active != '1') {
            Auth::logout();
            return redirect('/login')->withErrors('Akun Dinonaktifkan, Silahkan hubungi Admin!');
        }

        return $next($request);
    }
}
