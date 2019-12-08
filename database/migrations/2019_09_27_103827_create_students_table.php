<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
           $table->bigIncrements('student_id');
           $table->string('first_name');
           $table->string('last_name');
           $table->boolean('sex');
           $table->date('dob');
           $table->string('email')->nullable();
           $table->boolean('status');
           $table->string('nationality')->nullable();
           $table->string('national_card')->nullable();
           $table->string('passport')->nullable();
           $table->string('phone')->nullable();
           $table->string('village')->nullable();
           $table->string('commune')->nullable();
           $table->string('district')->nullable();
           $table->string('province')->nullable();
           $table->string('current_address')->nullable();
           $table->date('dateregistered');
           $table->integer('user_id')->unsigned();
           $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
