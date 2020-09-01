<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffSchedulesTable extends Migration {
  public function up() {
    Schema::create("staff_schedules", function (Blueprint $table) {
      $table->bigIncrements("id");
      $table->integer("staff_id")->unsigned();
      $table->time("start");
      $table->time("end");

      $table->string("sun")->nullable();
      $table->string("mon")->nullable();
      $table->string("tue")->nullable();
      $table->string("wed")->nullable();
      $table->string("thu")->nullable();
      $table->string("fri")->nullable();
      $table->string("sat")->nullable();

      $table->timestamps();

      $table->foreign("staff_id")->references("id")->on("sm_classes")->onDelete("restrict");
    });
  }

  public function down() {
    Schema::dropIfExists("staff_schedules");
  }
}
