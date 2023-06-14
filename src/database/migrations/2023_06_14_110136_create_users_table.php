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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email', 320)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_password', 512);
            $table->string('user_name', 64);
            $table->char('user_gender');
            $table->date('user_birthdate');
            $table->string('user_nickname', 64);
            $table->string('user_profile', 512)->nullable();
            $table->string('user_zipcode', 10)->nullable();
            $table->string('user_address', 255)->nullable();
            $table->string('user_address_detail', 255)->nullable();
            $table->char('user_marketing_agreement', 1)->default('0');
            $table->char('user_email_agreement', 1)->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
            $table->integer('wr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
