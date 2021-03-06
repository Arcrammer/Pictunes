<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([[
      'username' => 'iAlexander',
      'password' => bcrypt('secret'),
      'email' => 'iAlexander@pictunes.dev',
      'selfie_name' => 'ProfilePhoto.png',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ], [
      'username' => 'Arcrammer',
      'password' => bcrypt('secret'),
      'email' => 'Arcrammer@pictunes.dev',
      'selfie_name' => 'ProfilePhoto.png',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ], [
      'username' => 'Matt',
      'password' => bcrypt('secret'),
      'email' => 'Matt@pictunes.dev',
      'selfie_name' => 'ProfilePhoto.png',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]]);
  }
}
