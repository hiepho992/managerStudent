<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->longText('image')->nullable();
            $table->date('dateOfBirth');
            $table->boolean('gender');
            $table->string('nation');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('specialize');
            $table->string('salary');
            $table->boolean('active')->default(true);
            $table->unsignedInteger('classe_id')->nullable();
            $table->foreign('classe_id')->references('id')->on('classes');
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
        Schema::dropIfExists('teachers');
    }
}
