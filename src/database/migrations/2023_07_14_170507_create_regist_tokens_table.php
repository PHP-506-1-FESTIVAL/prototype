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
        Schema::create('regist_tokens', function (Blueprint $table) {
            $table->increments('mail_id');
            $table->string('send_mail',320);
            $table->timestamp('send_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('send_timer')->default(DB::raw('date_add(current_timestamp, interval +1 day)'));
            $table->char('mail_flg',1);
            $table->string('mail_token',40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regist_tokens');
    }
};
