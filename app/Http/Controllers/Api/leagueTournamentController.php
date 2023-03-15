<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class leagueTournamentController extends Controller
{



    public function index()
    {
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/leagues-cups/%d8%af%d9%88%d8%b1%d9%8a%d8%a7%d8%aa-%d9%88%d8%a8%d8%b7%d9%88%d9%84%d8%a7%d8%aa#nav-menu');


        $index = 0;
        $leagues = [];



        $data->filter('.tourListing .toursCntnr  .tourItem ul li')->each(function ($node) use (&$leagues, &$index) {


            $node->filter('a')->each(function ($node) use (&$leagues, &$index) {

                $node->filter('a')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['id'] = $node->attr('href');
                });

                $node->filter('a p')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['tournament_name'] = $node->text();
                });

                $node->filter('.imgCntnr img')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['tournament_image'] = $node->attr('src');
                });
            });


            $index++;
        });


        return sendJsonResponse($leagues, 'leagues');
    }
    public function show($slug, $slug2, $slug3, $slug4)
    {
        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parm);


        $index = 0;
        $leagues = [];



        $data->filter('.tourTeams .tourTeamsCntnr ul li')->each(function ($node) use (&$leagues, &$index) {


            $node->filter('a p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['name'] = $node->text();

            });

            $node->filter('a img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['iamge'] = $node->attr('src');

            });


            $index++;
        });


        return sendJsonResponse($leagues, 'leagues');
    }
}
