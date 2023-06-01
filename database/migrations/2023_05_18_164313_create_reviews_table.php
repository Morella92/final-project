<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user', 50)->required();
            $table->text('text')->required();
            $table->date('date_fake')->default(Carbon::createFromFormat('Y-m-d', '2018-01-01')->addDays(rand(0, Carbon::now()->diffInDays(Carbon::createFromFormat('Y-m-d', '2018-01-01')))));
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
        Schema::dropIfExists('reviews');
    }
};