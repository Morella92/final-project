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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->required();
            $table->text('text')->required();
            $table->string('ui_name', 50)->required();
            $table->string('ui_email', 100)->required();
            $table->string('ui_phone', 50)->nullable();
            $table->date('date_fake')->default(Carbon::createFromFormat('Y-m-d', '2018-01-01')->addDays(rand(0, Carbon::now()->diffInDays(Carbon::createFromFormat('Y-m-d', '2018-01-01')))))->nullable();
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
        Schema::dropIfExists('messages');
    }
};