<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use MySportsFeeds\MySportsFeeds;

class MysportsfeedController extends Controller
{
    public function test() {

        // Get cURL resource
        $ch = curl_init();

        // Set url
        curl_setopt($ch, CURLOPT_URL, 'https://api.mysportsfeeds.com/v1.1/pull/mlb/2018-regular/cumulative_player_stats.json');

        // Set method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // Set options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Set compression
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");

        // Set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        	"Authorization: Basic " . base64_encode('9e2f8820-0074-41fb-b46d-f5de62' . ":" . 'kentucky11')
        ]);

        // Send the request & save response to $resp
        $resp = curl_exec($ch);
        \Storage::disk('local')->put('stats.json', $resp);

        if (!$resp) {
        	die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        } else {
        	echo "Response HTTP Status Code : " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
        	echo "\nResponse HTTP Body : " . $resp;
        }

        // Close request to clear up some resources
        curl_close($ch);

    }



    public function parseStats() {
        $string = \Storage::disk('local')->get('stats.json');

        $stats = json_decode($string, true);

        // dd($stats['cumulativeplayerstats']['playerstatsentry'][1]['stats']);

        foreach ($stats['cumulativeplayerstats']['playerstatsentry'] as $stat) {

            $player = $stat['player'];
            $cats = $stat['stats'];

            if ($cats['GamesPlayed']['#text'] > 10) {

                \DB::table('players')->insert([
                    'id' => ($player['ID']),
                    'name' => ($player['LastName'].", ".$stat['player']['FirstName']),
                    'position' => ($player['Position']),
                ]);
            }
        }
    }



    public function populateStats() {

        $string = \Storage::disk('local')->get('stats.json');

        $stats = json_decode($string, true);

        foreach ($stats['cumulativeplayerstats']['playerstatsentry'] as $stat) {

            $player = $stat['player'];
            $cats = $stat['stats'];

            if ($cats['GamesPlayed']['#text'] > 10) {

                foreach ($cats as $cat) {

                    if (array_key_exists('@category', $cat)) {

                        if ($player['Position'] == 'P' && $cat['@category'] == 'Pitching') {

                            \DB::table('stats')->insert([
                                'player_id' => $player['ID'],
                                'category_id' => $cat['@abbreviation'],
                                'value' => $cat['#text'],

                                // TODO: zscore function
                                'zscore' => null,
                            ]);
                        }

                        elseif ($player['Position'] != 'P' && $cat['@category'] == 'Batting') {

                            \DB::table('stats')->insert([
                                'player_id' => $player['ID'],
                                'category_id' => $cat['@abbreviation'],
                                'value' => $cat['#text'],

                                // TODO: zscore function
                                'zscore' => null,
                            ]);
                        }
                    }
                }
            }
        }
    }


    public function standard_deviation_population($a) {

        $a = $a->toArray();
          //variable and initializations
          $the_standard_deviation = 0.0;
          $the_variance = 0.0;
          $the_mean = 0.0;
          $the_array_sum = array_sum($a); //sum the elements
          $number_elements = count($a); //count the number of elements

          //calculate the mean
          $the_mean = $the_array_sum / $number_elements;

          //calculate the variance
          for ($i = 0; $i < $number_elements; $i++)
          {
            //sum the array
            $the_variance = $the_variance + ($a[$i]->value - $the_mean) * ($a[$i]->value - $the_mean);
          }

          $the_variance = $the_variance / $number_elements;

          //calculate the standard deviation
          $the_standard_deviation = pow( $the_variance, 0.5);

          //return the variance
          return $the_standard_deviation;
    }


    public function avgJob() {

        $catAvgArray = [];
        $catSdArray = [];

        $cats = \DB::table('stats')->select('category_id')->get();
        $cats = $cats->unique();

        foreach($cats as $cat) {

            // Given a category, return a collection of values for that category
            $values = \DB::table('stats')->select('value')->where('category_id', $cat->category_id)->get();

            // Calculate the Average
            $avg = $values->avg('value');

            // Calculate standard deviation
            $sd = Self::standard_deviation_population($values);

            // Insert into arrays
            $catAvgArray[$cat->category_id] = $avg;
            $catSdArray[$cat->category_id] = $sd;


        }

        dd($catAvgArray);

    }




    public function zscore($value, $avg, $sd) {

        // Calculate the Average
        $avg = $values->avg();

        // Calculate standard deviation
        $sd = stats_standard_deviation($values);

        // For each player+category index, insert calculated zscore
        foreach ($players as $player) {

            // Insert into DB

            // Return zscore value
            return ($value - $avg) / $sd;
        }
    }

}
