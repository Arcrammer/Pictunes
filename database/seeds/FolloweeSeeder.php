<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FolloweeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('followers')->insert([[
        'follower' => 1,
        'followee' => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ], [
        'follower' => 1,
        'followee' => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]]);
    }
}
