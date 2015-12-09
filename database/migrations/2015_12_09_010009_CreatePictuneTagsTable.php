<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictuneTagsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pictune_tags', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('pictune')->unsigned();
      $table->integer('tag')->unsigned();

      // Foreign Keys
      $table->foreign('pictune')
        ->references('id')
        ->on('pictunes');
      $table->foreign('tag')
        ->references('id')
        ->on('tags');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('pictune_tags');
  }
}
