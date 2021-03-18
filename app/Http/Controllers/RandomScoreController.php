<?php

namespace App\Http\Controllers;

use DB;
use App\Models\RandomScore;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RandomScoreController extends Controller
{
    public function generate(Request $request)
    {
      $randomScore = rand(1, 100);

      $data = [];

      if($randomScore) {
        $data['status'] = 1;
        $data['data'] = $randomScore;
        RandomScore::create([
            'random_score' => $randomScore
        ]);
      } else {
        $data['status'] = 0;
      }

      return $data;
    }

    public function getAllScores(Request $request)
    {
      $randomScores = RandomScore::all();

      $data = [];

      if($randomScores) {
        $data['status'] = 1;
        $data['data'] = $randomScores;
      } else {
        $data['status'] = 0;
      }

      return $data;
    }

    public function getRandomScoresPerDay(Request $request)
    {
      $randomScores = RandomScore::select([
        DB::raw('count(id) as "random_score_count"'),
        DB::raw('DATE(created_at) as date')
      ])->groupBy('date')->get();

      $data = [];

      if($randomScores) {
        $data['status'] = 1;
        $data['data'] = $randomScores;
      } else {
        $data['status'] = 0;
      }

      return $data;
    }
}
