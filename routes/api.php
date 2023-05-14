<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CatgoryController;
use App\Http\Controllers\Api\ClubDetailController;
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
use  App\Http\Controllers\Api\GroupsController;
use App\Http\Controllers\Api\TeamNewController;
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

    Route::get('statistics-match/{slug}/{slug1}/{slug2}/{slug3}/{slug4}', [MatchController::class, 'statisticsMatch']);


    Route::get('all-matches', [MatchController::class, 'allMatch']);

    Route::get('all-matches-en', [MatchEnController::class, 'index']);

    Route::get('all-tournaments', [MatchController::class, 'allTournament']);

    Route::get('match-videos', [MatchVideoController::class, 'index']);
    Route::get('all-videos', [MatchVideoController::class, 'allVideo']);
    Route::get('related-videos/{slug1}/{slug2}/{slug3}', [MatchVideoController::class, 'RelatedtVideo']);
    Route::get('details-video/{slug1}/{slug2}/{slug3}/{slug4?}/{slug5?}', [MatchVideoController::class, 'detailsVideo']);

    Route::get('all-teams/{parms1?}/{parms2?}/{parms3?}/{params4?}/{params?}', [TeamController::class, 'index']);


    ////leagues-tournaments
    Route::get('leagues-tournaments', [leagueTournamentController::class, 'index']);
    Route::get('leagues-en-tournaments',[leagueTournamentController::class, 'indexEn']);



    Route::group(['prefix' => 'leagues-tournaments'], function () {

        // Route::get('videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5?}', [leagueTournamentMediaController::class, 'index']);


        Route::get('videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5?}', [leagueTournamentMediaController::class, 'index']);


        Route::get('groups/{slug}/{slug1}/{slug3}/{slug4}', [leagueTournamentGroupController::class, 'index']);
        // Route::get('related-videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5}', [leagueTournamentMediaController::class, 'relatedVideo']);

        Route::get('details-video/{slug}/{slug1}/{slug3}/{slug4}', [leagueTournamentMediaController::class, 'show']);
    });


    Route::get('match-results-tournaments/{slug}/{slug2}/{slug3}/{slug4}/{slug5?}', [leagueTournamentController::class, 'MatchResult']);
    Route::get('match-center', [MatchController::class, 'matchCenter']);

    Route::get('scorers-tournaments/{slug}/{slug2}/{slug3}/{slug4}/{slug5?}', [leagueTournamentController::class, 'scorer']);



    Route::get('leagues-tournaments/{slug}/{slug2}/{slug3}/{slug4?}/{slug5?}', [leagueTournamentController::class, 'details']);

    Route::get('details-leagues-tournaments/{slug}/{slug2}/{slug3}/{slug4}', [leagueTournamentController::class, 'show']);

    Route::get('statistics-leagues-tournaments/{slug}/{slug2}/{slug3}/{slug4}/{slug5?}', [StatisticsLeagueTournamentController::class, 'show']);





    Route::get('important-latest-transfers/{id}', [LatestTransferController::class, 'importantTransfer']);

    Route::get('latest-transfers-all-leagues', [LatestTransferController::class, 'allLeague']);


    Route::get('latest-transfers/{id}', [LatestTransferController::class, 'index']);
    Route::group(['prefix' => 'latest-transfer'], function () {

        Route::get('latest-news', [LatestTransferController::class, 'latestNew']);
        Route::get('home-top', [LatestTransferController::class, 'homeTop']);
        Route::get('home-bottom/{param1}/{param2}/{param4}', [LatestTransferController::class, 'homeBottom']);

        Route::get('important-topics/{param1}/{param2}/{param4}', [LatestTransferController::class, 'importantTopic']);
        Route::get('read-more-news/{param1}/{param2}/{param4}', [LatestTransferController::class, 'readMoreNew']);

    });



    Route::group(['prefix' => 'club-details'], function () {

        Route::get('{slug}/{slug1}/{slug3}/{slug4}/{slug5}', [ClubDetailController::class, 'details']);


        Route::get('groups/{slug}/{slug1}/{slug3}/{slug4}', [leagueTournamentGroupController::class, 'index']);
        // Route::get('related-videos/{slug}/{slug1}/{slug3}/{slug4}/{slug5}', [leagueTournamentMediaController::class, 'relatedVideo']);

        Route::get('tabs/{slug}/{slug1}/{slug3}/{slug4}/{slug5}', [ClubDetailController::class, 'tabs']);
    });

    Route::get('player-details/{slug}/{slug1}/{slug3}/{slug4}/{slug5}', [ClubDetailController::class, 'playerDetail']);





    Route::apiResource('categories', CatgoryController::class);

    Route::apiResource('news', NewController::class);
    Route::apiResource('banners', BannerController::class);

    Route::get('team-news/{param1}/{param2}/{param3}/{param4}/{param5}',[TeamNewController::class,'show']);
    Route::get('team-videos/{param1}/{param2}/{param3}/{param4}/{param5}',[TeamNewController::class,'teamVideos']);

    Route::apiResource('tournament-news', TournamentNewController::class);

        Route::get('groups/{param1}/{param2}/{param3}/{param4}/{param5?}', [GroupsController::class, 'index']);
        Route::get('previous-encounter/{param1}/{param2}/match/{param3}/{param4}', [MatchController::class, 'previousEncounter']);
});
