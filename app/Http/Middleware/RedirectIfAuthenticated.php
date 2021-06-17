<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('customer')->check()) {
            return redirect('customer/DashboardCustomer');
        } else if (Auth::guard('outsourcing')->check()) {
            return redirect('outsourcing/DashboardOsr');
        }else if (Auth::guard('tenagaKerja')->check()) {
            return redirect('tenagakerja/ProfilTenagaKerja');
        }

        return $next($request);
    }
}
