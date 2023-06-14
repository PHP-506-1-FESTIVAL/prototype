<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('festival_hits', function (Blueprint $table) {
            $table->increments('hit_id');
            $table->timestamp('hit_timer')->default(DB::raw('date_add(current_timestamp, interval +1 day)'));
            $table->timestamp('hit_today')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('select_cnt', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festival_hits');
    }
};
