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
        Schema::create('blacklists', function (Blueprint $table) {
            $table->increments('blacklist_id');
            $table->integer('user_id');
            $table->timestamp('banned_at');
            $table->softDeletes();
            $table->integer('admin_id');
            $table->char('blacklist_no',1)->nullable();
            $table->string('blacklist_detail',512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blacklists');
    }
};
