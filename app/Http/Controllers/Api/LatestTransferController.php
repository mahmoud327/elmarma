<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class LatestTransferController extends Controller
{


    public function index($parm)
    {
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/transfer-list/%d8%ac%d9%85%d9%8a%d8%b9-%d8%a7%d9%84%d8%a5%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/'.$parm);

        $index = 0;
        $leagues = [];



        $data->filter('.standing .wRow')->each(function ($node) use (&$leagues, &$index) {


            // $node->filter('')->each(function ($node) use (&$leagues, &$index) {

            $node->filter(' div.item.var')->each(function ($node) use (&$leagues, &$index) {

                // $leagues[$index]['image_team_to'] ='dd';

                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_to'] = $node->text();
                });



                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_to'] = $node->attr('src');
                });



                // });




            });

            $node->filter('div.item.var.fromTeam')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_from'] = $node->text();
                });

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_from'] = $node->attr('src');
                });
            });

            $node->filter('.item.fixed:first-child')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['date'] = $node->text();
            });
            $node->filter('.item.fixed')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['status'] = $node->text();
            });
            $node->filter('div.item.var:first-child')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_name'] = $node->text();
                });
                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_image'] = $node->attr('src');
                });
            });

            // });



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }

    public function allLeague()
    {
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/transfer');


        $index = 0;
        $leagues = [];



        $data->filter('.cd-filter-block  .cd-select select option')->each(function ($node) use (&$leagues, &$index) {
            $leagues[$index]['tournament_name'] = $node->text();
            $leagues[$index]['id'] = (int)$node->attr('value');



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }
}
