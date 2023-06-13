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
        Schema::create('boards', function (Blueprint $table) {
            $table->integer('board_id')->increments();
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->string('board_title', 255);
            $table->string('board_content', 2000);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('board_hit')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
