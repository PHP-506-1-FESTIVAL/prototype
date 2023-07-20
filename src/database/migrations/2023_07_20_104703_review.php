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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('review_id');
            $table->integer('festival_id');
            $table->integer('user_id');
            $table->string('review_content', 2000);
            $table->string('review_img', 512)->nullable();
            $table->char('rate', 1);
            $table->timestamps();
            $table->softDeletes();
            $table->char('like_experience', 1)->nullable();
            $table->char('like_theme', 1)->nullable();
            $table->char('like_mood', 1)->nullable();
            $table->char('like_food', 1)->nullable();
            $table->char('like_toilet', 1)->nullable();
            $table->char('like_parking', 1)->nullable();
            $table->char('like_cost', 1)->nullable();
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
