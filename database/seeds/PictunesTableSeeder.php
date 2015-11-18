<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PictunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictunes')->insert([[
          'post_creator' => 1,
          'image_name' => 'debug_image_1.jpg',
          'audio_name' => 'debug_audio_1.jpg',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 2,
          'image_name' => 'debug_image_2.jpg',
          'audio_name' => 'debug_audio_2.jpg',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 2,
          'image_name' => 'debug_image_3.jpg',
          'audio_name' => 'debug_audio_3.jpg',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 3,
          'image_name' => 'debug_image_4.jpg',
          'audio_name' => 'debug_audio_4.jpg',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 3,
          'image_name' => 'debug_image_5.jpg',
          'audio_name' => 'debug_audio_5.jpg',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
      ]]);
    }
}
