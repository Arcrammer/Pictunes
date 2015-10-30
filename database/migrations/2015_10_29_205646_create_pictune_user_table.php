<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictuneUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pictune_creator');
        Schema::create('pictune_creator', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pictune_id');
            $table->bigInteger('post_creator');
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
        Schema::dropIfExists('pictune_creator');
    }
}
