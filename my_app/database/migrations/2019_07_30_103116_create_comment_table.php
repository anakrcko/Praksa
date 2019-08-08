<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->longText('text');
            $table->timestamps();
        });
        Schema::table('comment', function (Blueprint $table) {
            $table->unsignedBigInteger('userCommentId');
            $table->unsignedBigInteger('postCommentId');
            $table->unsignedBigInteger('userPostId');

            $table->foreign('userPostId')->references('id')->on('users');
            $table->foreign('userCommentId')->references('id')->on('users');
            $table->foreign('postCommentId')->references('id')->on('post');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
