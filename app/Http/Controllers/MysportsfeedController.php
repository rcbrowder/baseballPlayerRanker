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

        // foreach ($stats['cumulativeplayerstats']['playerstatsentry'] as $stat) {
        //
        //          echo ($stat['player']['LastName'].", ".$stat['player']['FirstName']);
        //
        // }

        dd($stats['cumulativeplayerstats']['playerstatsentry'][69]);

        foreach ($stats['cumulativeplayerstats']['playerstatsentry'] as $stat) {

            \DB::table('players')->insert([
                'id' => ($stat['player']['ID']),
                'name' => ($stat['player']['LastName'].", ".$stat['player']['FirstName']),
                'position' => ($stat['player']['Position']),
            ]);

            // foreach ($stat[] as $st) {
            //     $player =
            //     \DB::table('stats')->insert([
            //         'player_id' =>
            //     ]);
            //
            // }

        }

    }

}
