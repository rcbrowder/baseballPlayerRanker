<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use MySportsFeeds\MySportsFeeds;

class StatsController extends Controller
{

    public function index(Request $request) {

        dd($request);

        // Collection of first 20 players
        $players = \DB::table('players')->get();
        $players = $players->slice(0,15);


        // Collection of first 2000 stats
        $stats = \DB::table('stats')->get();
        $stats = $stats->slice(0, 2000);

        // Collection of first 10 unique categories
        $categories = $stats->unique('category_id')->pluck('category_id');
        $categories = $categories->slice(0,15);

        // Initialize empty arrays
        $totalArray = [];
        $zscoreArray = [];
        $a = [];

        // Calculate z-score total for selected categories
        foreach ($players as $player) {
            foreach ($categories as $cat) {

                $total = $stats->where('player_id', $player->id)->pluck('zscore')->sum();

                $z = \DB::table('stats')->select('zscore')->where('category_id', $cat)->where('player_id', $player->id)->get()->first();

                if ($z == null) {
                    array_push($a, "0.00");
                }
                else{
                    array_push($a, $z->zscore);
                }

                // Insert z-score total into an array with player_id as key
                $totalArray[$player->id] = $total;
            }
            array_push($zscoreArray, $a);
            $a = [];
        }

    // Order players by total z-score
        arsort($totalArray);
        $order = array_keys($totalArray);

        $playersArray = [];
        foreach ($order as $p) {
            $playersArray[] = $players->where('id', $p)->first();
        }

        foreach($totalArray as $total) {
            $total = round($total, 2);
            array_push($totalArray, $total);
            array_shift($totalArray);
        }

        $players = collect($playersArray)->values();
        $totalArray = collect($totalArray);
        $zscoreArray = collect($zscoreArray)->values();

        // dd($categories);

        return view('stats2', compact('totalArray', 'zscoreArray', 'players', 'categories'));
    }

    public function buttons() {

    }
}
