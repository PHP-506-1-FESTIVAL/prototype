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
        Schema::create('request', function (Blueprint $table) {
            $table->increments('req_id');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('req_title', 255);
            $table->date('req_start_date');
            $table->date('req_end_date');
            $table->string('area_code', 64);
            $table->string('sigungu_code', 64);
            $table->string('map_x', 64);
            $table->string('map_y', 64);
            $table->string('content_type_id', 64);
            $table->string('tel', 64);
            $table->string('poster_img', 512);
            $table->string('list_img', 512);
            $table->string('homepage', 512)->nullable();
            $table->string('business_id', 64);
            $table->char('req_state', 1)->default('0');
            $table->timestamp('allowed_at')->nullable();
            $table->integer('admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
};
