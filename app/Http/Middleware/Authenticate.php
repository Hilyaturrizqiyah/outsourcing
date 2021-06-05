<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect('customer/DashboardCustomer');
        } else if (Auth::guard('outsourcing')->check()) {
            return redirect('outsourcing/DashboardOsr');
        }else if (Auth::guard('tenagaKeja')->check()) {
            return redirect('tenagakerja/ProfilTenagaKerja');
        }
    }
}
