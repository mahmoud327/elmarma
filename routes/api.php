<?php

use App\Http\Controllers\Api\CatgoryController;
use App\Http\Controllers\Api\LatestTransferController;
use App\Http\Controllers\Api\leagueTournamentController;
use App\Http\Controllers\Api\leagueTournamentGroupController;
use App\Http\Controllers\Api\leagueTournamentMediaController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\MatchEnController;
use App\Http\Controllers\Api\MatchVideoController;
use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SportPostController;
use App\Http\Controllers\Api\StatisticsLeagueTournamentController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TournamentNewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1', 'middleware' => ['cors', 'lang']], function () {

    Route::apiResource('posts', PostController::class);
    Route::apiResource('sports-woman', SportPostController::class);

    Route::get('matches', [MatchController::class, 'index']);
    Route::get('details-match/{slug}/{slug1}/{slug2}/{slug3}/{slug4}', [MatchController::class, 'show']);
    Route::get('all-matches', [MatchController::class, 'allMatch']);

    Route::get('all-matches-en', [MatchEnController::class, 'index']);

    Route::get('all-tournaments', [MatchController::class, 'allTournament']);

    Route::get('match-videos', [MatchVideoController::class, 'index']);
    Route::get('all-videos', [MatchVideoController::class, 'allVideo']);
    Route::get('related-videos/{slug1}/{slug2}/{slug3}', [MatchVideoController::class, 'RelatedtVideo']);
    Route::get('details-video/{slug1}/{slug2}/{slug3}/{slug4?}/{slug5?}', [MatchVideoController::class, 'detailsVideo']);
    Route::get('all-teams', [TeamController::class, 'index']);


    ////leagues-tournaments
    Route::get('leagues-tournaments', [leagueTournamentController::class, 'index']);


    Route::group(['prefix' => 'leagues-tournaments'], function () {

        // Route::get('videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5?}', [leagueTournamentMediaController::class, 'index']);


        Route::get('videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5?}', [leagueTournamentMediaController::class, 'index']);


        Route::get('groups/{slug}/{slug1}/{slug3}/{slug4}', [leagueTournamentGroupController::class, 'index']);
        // Route::get('related-videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5}', [leagueTournamentMediaController::class, 'relatedVideo']);

        Route::get('details-video/{slug}/{slug1}/{slug3}/{slug4}', [leagueTournamentMediaController::class, 'show']);
    });


    Route::get('match-results-tournaments/{slug}/{slug2}/{slug3}/{slug4}', [leagueTournamentController::class, 'MatchResult']);
    Route::get('scorers-tournaments/{slug}/{slug2}/{slug3}/{slug4}', [leagueTournamentController::class, 'Scorer']);



    Route::get('leagues-tournaments/{slug}/{slug2}/{slug3}/{slug4?}', [leagueTournamentController::class, 'details']);

    Route::get('details-leagues-tournaments/{slug}/{slug2}/{slug3}/{slug4}', [leagueTournamentController::class, 'show']);

    Route::get('stastics-leagues-tournaments/{slug}/{slug2}/{slug3}/{slug4}/{slug5?}', [StatisticsLeagueTournamentController::class, 'show']);



    Route::get('latest-transfers/{id}',[LatestTransferController::class,'index']);
    Route::get('important-latest-transfers/{id}',[LatestTransferController::class,'importantTransfer']);

    Route::get('latest-transfers-all-leagues',[LatestTransferController::class,'allLeague']);



    Route::apiResource('categories', CatgoryController::class);

    Route::apiResource('news', NewController::class);
    Route::apiResource('tournament-news', TournamentNewController::class);
});
