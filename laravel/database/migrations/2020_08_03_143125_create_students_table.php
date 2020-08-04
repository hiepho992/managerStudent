<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('fullName');
            $table->longText('image');
            $table->date('dateOfBirth');
            $table->boolean('gender');
            $table->date('nation');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('faName');
            $table->string('faPhone');
            $table->string('moName');
            $table->string('moPhone');
            $table->unsignedInteger('classe_id')->nullable();
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->boolean('active')->default(true);
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
