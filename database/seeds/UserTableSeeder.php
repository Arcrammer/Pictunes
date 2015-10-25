<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ], [
            'username' => 'Arcrammer',
            'password' => bcrypt('secret'),
            'email' => 'Arcrammer@pictunes.dev',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ], [
            'username' => 'Matt',
            'password' => bcrypt('secret'),
            'email' => 'Matt@pictunes.dev',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]]);
    }
}
