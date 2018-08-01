<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $categories = [
            '1B' => 'Singles',
            '2B' => 'Doubles',
            '3B' => 'Triples',
            'HR' => 'Home Runs',
            'BA' => 'Batting Average',
            'BB' => 'Walks',
            'XBH' => 'Extra Base Hits',
            'H' => 'Extra Base Hits',
            'HBP' => 'Hit By Pitchs',
            'K' => 'Strikeouts',
            'OBP' => 'On-Base Percentage',
            'OPS' => 'On-Base Plus Slugging',
            'R' => 'Runs',
            'RBI' => 'Runs Batted In',
            'SLG' => 'Slugging Percentage',
            'SB' => 'Stolen Bases',
            'TB' => 'Total Bases',
            'ISO' => 'Isolated Power',
            'WAR' => 'Wins Above Replacement',
            'G' => 'Games Played'
        ];

        foreach ($categories as $abv => $name) {

            DB::table('categories')->insert([
                'name' => $name,
                'abreviation' => $abv,
                'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now()
            ]);
        }
    }
}
