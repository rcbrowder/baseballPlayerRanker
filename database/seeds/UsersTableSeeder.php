<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('users')->insert([
    		'name' => 'Chris',
    		'email' => 'chris@example.com',
    		'password' => bcrypt('chris'),
            'batterCategories' => null,
            'pitcherCategories' => null,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

        DB::table('users')->insert([
    		'name' => 'Cameron',
    		'email' => 'Cameron@example.com',
    		'password' => bcrypt('cameron'),
            'batterCategories' => null,
            'pitcherCategories' => null,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);
    }
}
