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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('report_id');
            $table->integer('board_id')->nullable();
            $table->integer('comment_id')->nullable();
            $table->integer('user_id');
            $table->char('report_type', 1);
            $table->char('report_no', 1);
            $table->string('report_detail', 512)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('admin_id')->nullable();
            $table->char('handle_flg', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
