<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_vote', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id'); 
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->unsignedBigInteger('vote_id');
            $table->foreign('vote_id')->references('id')->on('votes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_vote');
    }
};
