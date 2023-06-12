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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('user_email', 320)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_password', 512);
            $table->string('user_nickname', 64);
            $table->string('user_profile', 512)->nullable();
            $table->char('user_gender')->nullable();
            $table->timestamp('user_birthdate')->nullable();
            $table->string('user_zipcode', 10)->nullable();
            $table->string('user_address', 255)->nullable();
            $table->string('user_address_detail', 255)->nullable();
            $table->char('user_marketing_agreement', 1)->default('0');
            $table->char('user_email_agreement', 1)->default('0');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
