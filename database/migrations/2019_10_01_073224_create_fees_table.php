<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
         $table->bigIncrements('fee_id');
         $table->unsignedBigInteger('academic_id');
         $table->unsignedBigInteger('program_id');
         $table->unsignedBigInteger('fee_type_id');
         $table->string('fee_heading')->nullable();
         $table->float('amount',8,2);

         $table->foreign('academic_id')->references('academic_id')->on('academics');
         $table->foreign('program_id')->references('program_id')->on('programs');
         $table->foreign('fee_type_id')->references('fee_type_id')->on('feetypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
