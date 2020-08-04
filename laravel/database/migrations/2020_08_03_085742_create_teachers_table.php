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
            $table->string('faName')->nullable();
            $table->string('faPhone')->nullable();
            $table->string('moName')->nullable();
            $table->string('moPhone')->nullable();
            $table->string('specialize');
            $table->boolean('active')->default(1);
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
