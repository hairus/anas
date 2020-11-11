<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class siswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if ($user) {
            if ($user->keterangan == 'siswa') {
                return $next($request);
            }
        }
        return abort('403');
    }
}
