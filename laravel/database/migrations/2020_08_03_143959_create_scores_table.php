<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('times');
            $table->string('listening');
            $table->string('skeaking');
            $table->string('reading');
            $table->string('writing');
            $table->unsignedInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::dropIfExists('scores');
    }
}
