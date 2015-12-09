<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('follows', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('follower')->unsigned();
      $table->integer('follows')->unsigned();
      $table->softDeletes();
      $table->timestamps();

      // Foreign Keys
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
    Schema::drop('follows');
  }
}
