<?php

Route::prefix("schedule")->middleware("XSS")->group(function() {
  Route::get("/view", "ScheduleController@redirect_view");
  Route::get("/view/{id}", "ScheduleController@view");
  Route::post("/view/select", "ScheduleController@view_select");

  Route::group(["middleware" => ["CheckDashboardMiddleware"]], function () {
    Route::get("/", "ScheduleController@redirect_index");
    Route::post("/select", "ScheduleController@select");
    Route::post("/select_color", "ScheduleController@select_color");
    Route::post("/note_add", "ScheduleController@note");
    Route::post("/update/{id}", "ScheduleController@update");
    Route::post("/delete/{id}", "ScheduleController@delete");
    Route::post("/{id}", "ScheduleController@create");
    Route::get("/{id}", "ScheduleController@index");
  });
});
