<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorNoteSchedulesTable extends Migration {
  public function up() {
    Schema::create("color_note_schedules", function (Blueprint $table) {
      $table->increments("id");
      $table->string("name");
      $table->string("color");

      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists("color_note_schedules");
  }
}
