<?php

use Illuminate\Http\Request;

Route::middleware("auth:api")->get("/schedule", function (Request $request) {
  return $request->user();
});