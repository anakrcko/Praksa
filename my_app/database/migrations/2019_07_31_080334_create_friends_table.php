<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id1');
            $table->unsignedBigInteger('id2');
            $table->timestamps();
        });
        Schema::table('friends', function (Blueprint $table) {
            $table->unsignedBigInteger('userId1');
            $table->unsignedBigInteger('userId2');

            $table->foreign('userId1')->references('id')->on('users');
            $table->foreign('userId2')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
