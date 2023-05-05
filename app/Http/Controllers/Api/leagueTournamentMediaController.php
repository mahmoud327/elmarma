<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class leagueTournamentMediaController extends Controller
{


    public function index($slug, $slug1, $slug2, $slug3, $slug4 = null)
    {
        $parms = $slug . '/' . $slug1 . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parms);


        $index = 0;
        $leagues = [];



        $data->filter('.multimedia .cnts   ul li')->each(function ($node) use (&$leagues, &$index) {



            $node->filter('.link')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['id'] = $node->attr('href');


                $node->filter('.imageCntnr img')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['image'] = $node->attr('src');
                });

                $node->filter('.desc .time span')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['date'] = $node->text();
                });

                $node->filter('.desc p')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['title'] = $node->text();
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
