<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentfees', function (Blueprint $table) {
            $table->bigIncrements('s_fee_id');
            $table->unsignedBigInteger('fee_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('program_id');
            $table->float('amount');
            $table->float('discount');

             $table->foreign('fee_id')->references('fee_id')->on('fees');
             $table->foreign('student_id')->references('student_id')->on('students');
             $table->foreign('program_id')->references('program_id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentfees');
    }
}
