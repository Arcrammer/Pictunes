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
          $table->bigIncrements('id');
          $table->bigInteger('post_creator')
            ->unsigned()
            ->references('id')
            ->on('users');
          $table->string('image_name');
          $table->string('audio_name');
          $table->bigInteger('repost_count')->default(0);
          $table->bigInteger('heart_count')->default(0);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictunes');
    }
}
