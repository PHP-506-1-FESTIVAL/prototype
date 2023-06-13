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
        Schema::create('festival', function (Blueprint $table) {
            $table->increments('festival_id');
            $table->string('festival_title', 255);
            $table->date('festival_start_date');
            $table->date('festival_end_date');
            $table->string('area_code', 64);
            $table->string('sigungu_code', 64);
            $table->string('map_x', 64);
            $table->string('map_y', 64);
            $table->string('content_type_id', 64);
            $table->string('tel', 64);
            $table->string('poster_img', 512);
            $table->string('list_img', 512);
            $table->string('homepage', 512)->nullable();
            $table->integer('festival_hit')->default(0);
            $table->char('festival_state')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festival');
    }
};
