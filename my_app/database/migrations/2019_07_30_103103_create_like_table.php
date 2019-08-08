<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::table('like', function (Blueprint $table) {
            $table->unsignedBigInteger('userPostId');
            $table->unsignedBigInteger('postId');
            $table->unsignedBigInteger('userLikeId');

            $table->foreign('userPostId')->references('id')->on('users');
            $table->foreign('userLikeId')->references('id')->on('users');
            $table->foreign('postId')->references('id')->on('post');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like');
    }
}
