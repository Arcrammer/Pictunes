<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('followships');
        Schema::create('followships', function (Blueprint $table) {
          // Columns
          $table->bigIncrements('id');
          $table->bigInteger('follower');
          $table->bigInteger('follows');
          $table->timestamps();

          // Foreign keys
          $table->foreign('follower')
            ->references('id')
            ->on('users');
          $table->foreign('follows')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followships');
    }
}
