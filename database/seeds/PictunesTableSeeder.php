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
          'image_name' => 'debug_image_1',
          'audio_name' => 'debug_audio_1',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 2,
          'image_name' => 'debug_image_2',
          'audio_name' => 'debug_audio_2',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 2,
          'image_name' => 'debug_image_3',
          'audio_name' => 'debug_audio_3',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 3,
          'image_name' => 'debug_image_4',
          'audio_name' => 'debug_audio_4',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ], [
          'post_creator' => 3,
          'image_name' => 'debug_image_5',
          'audio_name' => 'debug_audio_5',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
      ]]);
    }
}
