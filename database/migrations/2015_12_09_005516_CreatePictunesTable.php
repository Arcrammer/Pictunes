<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictunesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pictunes', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('pictuner')->unsigned();
      $table->string('image_name');
      $table->string('audio_name');
      $table->integer('repost_count')->default(0);
      $table->integer('heart_count')->default(0);
      $table->softDeletes();
      $table->timestamps();

      // Foreign Keys
      $table->foreign('pictuner')
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
    Schema::drop('pictunes');
  }
}
