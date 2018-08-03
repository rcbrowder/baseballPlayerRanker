<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use MySportsFeeds\MySportsFeeds;

class StatsController extends Controller
{

    public function index() {
        // Collection of first 20 players
        $players = \DB::table('players')->get();
        $players = $players->slice(0,20);
        $playersSort = $players->pluck('id');


        // Collection of first 2000 stats
        $stats = \DB::table('stats')->get();
        $stats = $stats->slice(0, 2000);

        // Collection of first 10 unique categories
        $categories = $stats->unique('category_id')->pluck('category_id');
        $categories = $categories->slice(0,10);

        // Initialize empty arrays
        $totalArray = [];


        // Calculate z-score total for selected categories
        foreach ($players as $player) {
            foreach ($categories as $cat) {
                $total = $stats->where('player_id', $player->id)->pluck('zscore')->sum();

                // Insert z-score total into an array with player_id as key
                $totalArray[$player->id] = $total;
            }
        }

    // Order players by total z-score
        arsort($totalArray);
        $order = array_keys($totalArray);
        // $ordered_array = array_merge(array_flip($order), $players);
        




        foreach ($categories as $cat) {

            $z = \DB::table('stats')->select('player_id', 'zscore')->where('category_id', $cat)->get();
            $z = $z->sortByDesc('zscore');

        }

        return view('stats', compact('stats', 'players', 'categories'));
    }

    public function cumulativeZscore() {

    }
}
