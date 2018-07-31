<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MySportsFeeds\MySportsFeeds;

class MysportsfeedController extends Controller
{
    public function test() {

        // $msf = new MySportsFeeds("1.1");
        //
        // $msf->authenticate("9e2f8820-0074-41fb-b46d-f5de62", "kentucky11");
        //
        // $data = $msf->getData('mlb', '2018-regular', 'cumulative_player_stats', 'json');




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

        if (!$resp) {
        	die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        } else {
        	echo "Response HTTP Status Code : " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
        	echo "\nResponse HTTP Body : " . $resp;
        }

        // Close request to clear up some resources
        curl_close($ch);

    }

}
