<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class leagueTournamentGroupController extends Controller
{




    public function index($slug, $slug1, $slug2, $slug3)
    {
        $parms = $slug . '/' . $slug1 . '/' . $slug2 . '/' . $slug3;
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parms);


        $index = 0;
        $leagues = [];



        $data->filter('.groupsCarousel .groupItem')->each(function ($node) use (&$leagues, &$index) {



            $node->filter('.groupTtl h3')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['group_ttl'] = $node->text();

            });
            $node->filter('.table .wRow')->each(function ($node) use (&$leagues, &$index) {

                $node->filter('.wRow')->each(function ($node) use (&$leagues, &$index) {

                    $node->filter('.team')->each(function ($node) use (&$leagues, &$index) {


                        $leagues[$index]['d'] ='f';

                    });

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
