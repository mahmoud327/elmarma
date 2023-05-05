<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class TeamController extends Controller
{



    public function index()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/african-champions-league/2787/tour-hp/%d8%af%d9%88%d8%b1%d9%8a-%d8%a3%d8%a8%d8%b7%d8%a7%d9%84-%d8%a5%d9%81%d8%b1%d9%8a%d9%82%d9%8a%d8%a7#TourListing');


        $index = 0;
        $teams = [];
        

        $data->filter('.tourTeams .tourTeamsCntnr ul li')->each(function ($node) use (&$teams, &$index) {
            $node->filter('a')->each(function ($node) use (&$teams, &$index) {


                $teams[$index]['title'] = $node->attr('title');
                $teams[$index]['id'] = $node->attr('href');
            });
            $node->filter('a img')->each(function ($node) use (&$teams, &$index) {


                $teams[$index]['image'] = $node->attr('src');
            });


            $index++;
        });


        return sendJsonResponse($teams, 'teams');
    }










    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
