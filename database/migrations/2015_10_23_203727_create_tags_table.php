<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::dropIfExists('tags');
    Schema::create('tags', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });

    Schema::dropIfExists('pictune_tag');
    Schema::create('pictune_tag', function (Blueprint $table) {
      // Columns
      $table->integer('pictune_id')
        ->unsigned()
        ->index();
      $table->integer('tag_id')
        ->unsigned()
        ->index();
      $table->timestamps();

      // Foreign keys
      $table->foreign('pictune_id')
        ->references('id')
        ->on('pictunes')
        ->onDelete('cascade');
      $table->foreign('tag_id')
        ->references('id')
        ->on('tags')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    // Remove weird foreign key (I think this is a Postgres bug, although
    // there was an issue at GitHub about Rails so this is apparently more
    // widespead than Laravel and this application in particular.
    Schema::table('pictune_tag', function (Blueprint $table) {
      $table->dropForeign('pictune_tag_tag_id_foreign');
    });

    // Finally remove the tables
    Schema::drop('tags');
    Schema::drop('pictune_tag');
  }
}
