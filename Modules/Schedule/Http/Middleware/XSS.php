<?php

namespace Modules\Schedule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XSS {
  function handle($request, Closure $next) {
    $input = $request->all();
    array_walk_recursive($input, function(&$input) {
      $input = strip_tags($input);
    });
    $request->merge($input);
    return $next($request);
  }
}