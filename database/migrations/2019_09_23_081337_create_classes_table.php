<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
          $table->bigIncrements('class_id');
          $table->unsignedBigInteger('academic_id');
          $table->unsignedBigInteger('program_id');
          $table->unsignedBigInteger('shift_id');
          $table->unsignedBigInteger('time_id');
          $table->unsignedBigInteger('group_id');
          $table->unsignedBigInteger('batch_id');
          $table->date('start_date');
          $table->date('end_date');
          $table->boolean('active');

         $table->foreign('academic_id')->references('academic_id')->on('academics');
         $table->foreign('program_id')->references('program_id')->on('programs');
         $table->foreign('shift_id')->references('shift_id')->on('shifts');
         $table->foreign('time_id')->references('time_id')->on('times');
         $table->foreign('group_id')->references('group_id')->on('groups');
         $table->foreign('batch_id')->references('batch_id')->on('batches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
