<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\RandomScoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('login', [PassportController::class, 'login']);
Route::post('register', [PassportController::class, 'register']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:api'])->group(function () {
  Route::get('/user', function(Request $request){
    return $request->user();
  });
  Route::get('generate_random_score', [RandomScoreController::class, 'generate']);
  Route::get('get_all_random_scores', [RandomScoreController::class, 'getAllScores']);
  Route::get('random_scores_per_day', [RandomScoreController::class, 'getRandomScoresPerDay']);
});
