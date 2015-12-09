<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FollowsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('follows')->insert([[
      // @iAlexander -> @Arcrammer
      'follower' => 1,
      'follows' => 2,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ], [
      // @iAlexander -> @Matt
      'follower' => 1,
      'follows' => 3,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ], [
      // @Arcrammer -> @iAlexander
      'follower' => 2,
      'follows' => 1,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ], [
      // @Arcrammer -> @Matt
      'follower' => 2,
      'follows' => 3,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ], [
      // @Matt -> @Arcrammer
      'follower' => 3,
      'follows' => 2,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]]);
  }
}
