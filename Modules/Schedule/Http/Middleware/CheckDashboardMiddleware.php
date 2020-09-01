<?php

namespace Modules\Schedule\Http\Middleware;

use Closure;
use Auth;
use Session;
use Illuminate\Http\Request;

class CheckDashboardMiddleware {
  function handle($request, Closure $next) {
    session_start();
    $role_id = Session::get("role_id");
    if ($role_id == 2) {
      return redirect("student-dashboard");
    }elseif($role_id != ""){
      return $next($request);
    } else {
      return redirect("login");
    }
  }
}