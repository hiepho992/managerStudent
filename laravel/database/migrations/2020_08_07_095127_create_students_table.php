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
            $table->longText('image')->nullable();
            $table->date('dateOfBirth');
            $table->boolean('gender');
            $table->string('nation');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->boolean('active')->default(true);
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->softDeletes();
            $table->unsignedInteger('classe_id')->nullable();
            $table->foreign('classe_id')->references('id')->on('classes');
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
