<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmFeesNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_fees_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('Bus_Fee');
            $table->text('Loyalty_Sibling_Discount');
            $table->text('Late_Enrolment');
            $table->text('Special_Educational_Needs');
            $table->text('Late_Payment');
            $table->text('Early_Withdrawal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_fees_notes');
    }
}
