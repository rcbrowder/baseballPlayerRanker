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
            // Batting stats
            '1B' => 'Singles',
            '2B' => 'Doubles',
            '3B' => 'Triples',
            'HR' => 'Home Runs',
            'BA' => 'Batting Average',
            'BB' => 'Walks',
            'XBH' => 'Extra Base Hits',
            'H' => 'Hits',
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
            'G' => 'Games Played',

            //Pitching stats
            'W' => 'Win',
            'L' => 'Loss',
            'QS' => 'Quality Starts',
            'GP' => 'Games Played',
            'CG' => 'Complete Games',
            'SHO' => 'Shutouts',
            'SV' => 'Saves',
            'BS' => 'Blown Save',
            'OBA' => 'Opponents Batting Average',
            'HA' => 'Hits Allowed',
            'RA' => 'Runs Allowed',
            'HRA' => 'Home Runs Allowed',
            'BBA' => 'Walks',
            'SO' => 'Strikeouts',
            'ER' => 'Earned Runs',
            'ERA' => 'Earned Run Average',
            'FIP' => 'Fielding Independent Pitching',
            'WHIP' => 'Walks and Hits per Inning Pitched'
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
