<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteSchedulesTable extends Migration {
  public function up() {
    Schema::create("note_schedules", function (Blueprint $table) {
      $table->bigIncrements("id");
      $table->integer("schedule_id")->unsigned();
      $table->string("element");
      $table->text("body")->nullable();
      $table->integer("color_id")->default(1);

      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists("note_schedules");
  }
}
