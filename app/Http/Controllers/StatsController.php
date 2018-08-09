<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use MySportsFeeds\MySportsFeeds;

use Illuminate\Support\Facades\Log;


class StatsController extends Controller
{

    // public function index(Request $request) {
    //
    //     // dd($request);
    //
    //     // Collection of first 20 players
    //     $players = \DB::table('players')->get();
    //     $players = $players->slice(0,15);
    //
    //
    //     // Collection of first 2000 stats
    //     $stats = \DB::table('stats')->get();
    //     $stats = $stats->slice(0, 2000);
    //
    //     // Collection of first 10 unique categories
    //     $categories = $stats->unique('category_id')->pluck('category_id');
    //     $categories = $categories->slice(0,15);
    //
    //     // Initialize empty arrays
    //     $totalArray = [];
    //     $zscoreArray = [];
    //     $a = [];
    //
    //     // Calculate z-score total for selected categories
    //     foreach ($players as $player) {
    //         foreach ($categories as $cat) {
    //
    //             $total = $stats->where('player_id', $player->id)->pluck('zscore')->sum();
    //
    //             $z = \DB::table('stats')->select('zscore')->where('category_id', $cat)->where('player_id', $player->id)->get()->first();
    //
    //             if ($z == null) {
    //                 array_push($a, "0.00");
    //             }
    //             else{
    //                 array_push($a, $z->zscore);
    //             }
    //
    //             // Insert z-score total into an array with player_id as key
    //             $totalArray[$player->id] = $total;
    //         }
    //         array_push($zscoreArray, $a);
    //         $a = [];
    //     }
    //
    // Order players by total z-score
    //     arsort($totalArray);
    //     $order = array_keys($totalArray);
    //
    //     $playersArray = [];
    //     foreach ($order as $p) {
    //         $playersArray[] = $players->where('id', $p)->first();
    //     }
    //
    //     foreach($totalArray as $total) {
    //         $total = round($total, 2);
    //         array_push($totalArray, $total);
    //         array_shift($totalArray);
    //     }
    //
    //     $players = collect($playersArray)->values();
    //     $totalArray = collect($totalArray);
    //     $zscoreArray = collect($zscoreArray)->values();
    //
    //     return view('stats2', compact('totalArray', 'zscoreArray', 'players', 'categories'));
    // }

    public function refactor() {
        Log::info('Starting loop: '.microtime());
        $play = [];


        $stats = \DB::table('stats')->get();

        $categories = $stats->unique('category_id')->pluck('category_id');

        $players = \DB::table('players')->get();
        $players = $players->slice(0,100);

        $allCats = [];
        foreach ($categories as $cat) {
            array_push($allCats, $cat);
        }


        foreach ($players as $player) {
            // Do one select that pulls every stat for player_id

            $playerStat = $stats->where('player_id', $player->id);

            // Save in temporary array
            $allPlayerStats = [];

            $i = 0;
            foreach ($playerStat as $line) {
                if ($line) {
                    $allPlayerStats[$allCats[$i]] = $line->zscore;
                }
                else {
                    $allPlayerStats[$allCats[$i]] = null;
                }
                $i++;
            }



            $play[$player->id] = [

                'name' => $player->name,
                'position' => $player->position,

                // Instead of pulling all of these, reference temp array instead

                'AB' => $allPlayerStats["AB"],

                'LOB' => $allPlayerStats["LOB"],

                'PA' => $allPlayerStats["PA"],

                'R' => $allPlayerStats["R"],

                'H' => $allPlayerStats["H"],

                'twoB' => $allPlayerStats["2B"],

                'threeB' => $allPlayerStats["3B"],

                'HR' => $allPlayerStats["HR"],

                'RBI' => $allPlayerStats["RBI"],

                'BB' => $allPlayerStats["BB"],

                'SB' => $allPlayerStats["SB"],

                'AVG' => $allPlayerStats["AVG"],

                'OBP' => $allPlayerStats["OBP"],

                'SLG' => $allPlayerStats["SLG"],

                'total' => 0
            ];
        }

        $play = collect($play);

        Log::info('Ending loop: '.microtime());

        return view('stats', compact('play'));
    }
}
