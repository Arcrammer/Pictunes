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
    for ($i=1; $i <= 5; $i++) {
      DB::table('pictunes')->insert([[
        'pictuner' => rand(1, 3),
        'image_name' => 'debug_image_'.$i.'.jpg',
        'audio_name' => 'debug_audio_'.$i.'.jpg',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]]);
    }
  }
}
