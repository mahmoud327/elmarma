<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Goutte\Client;


class MatchController extends Controller
{


    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/match-center');
        $index = 0;
        $matches = [];
        $data->filter('.matchesHpCntnr ul li')->each(function ($node) use (&$matches, &$index) {


            $node->filter('a .tourName')->each(function ($node) use (&$matches, &$index) {
                //   dd($node->text());
                $matches[$index]['championship_type'] = $node->text();
            });
            $node->filter('a .teamA')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['first_team'] = $node->text();
            });
            $node->filter('a .teamB img')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['first_image'] = $node->attr('src');
            });

            $node->filter('a .teamB')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['second_team'] = $node->text();
            });

            $node->filter('a .teamB img')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['second_image'] = $node->attr('src');
            });

            $index++;
        });


        return sendJsonResponse($matches, 'matches');
    }
    public function allMatch()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/match-center');
        $index = 0;
        $matches = [];
        $data->filter('.matchCard')->each(function ($node) use (&$matches, &$index) {


            $node->filter('ul li .leftCol a')->each(function ($node) use (&$matches, &$index) {


               $matches[$index]['id'] ='https://www.yallakora.com/'.$node->attr('href');

            });

            $node->filter('.tourTitle  img')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['championship_type_img'] = $node->attr('src');
            });
            $node->filter('.tourTitle h2 ')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['championship_type'] = $node->text();
            });
            $node->filter('ul li a .allData .channel')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['channel_broadcasting_match'] = $node->text();
            });
            $node->filter('ul li a .allData .topData .date')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['date'] = $node->text();
            });
            $node->filter('ul li a .allData .topData .matchStatus span')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['match_status'] = $node->text();
            });

            $node->filter('ul li a .teamA img')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['first_image'] = $node->attr('src');
            });
            $node->filter('ul li a .teamA p')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['first_team'] = $node->text();
            });

            $node->filter('ul li a .teamB img')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['second_image'] =  $node->attr('src');
            });
            $node->filter('ul li a .teamB P')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['second_team'] = $node->text();
            });

            $node->filter('ul li a .MResult .time')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['game_time'] = $node->text();
            });

            $index++;
        });


        return sendJsonResponse($matches, 'matches');
    }


    public function allTournament()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/match-center');
        $index = 0;
        $all_tournaments = [];
        $data->filter('.matchesCenter .filter option')->each(function ($node) use (&$all_tournaments, &$index) {


            $all_tournaments[$index]['tournament_name'] = $node->text();
            $all_tournaments[$index]['tournament_id'] = (integer)$node->attr('value');


            $index++;

        });


        return sendJsonResponse($all_tournaments, 'all_tournaments');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



}
