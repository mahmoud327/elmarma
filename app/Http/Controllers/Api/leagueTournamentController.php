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

        $data = $client->request('GET', 'https://www.yallakora.com/leagues-cups');


        $index = 0;
        $leagues = [];
        $data->filter('.tourListing  .tourItem')->each(function ($node) use (&$leagues, &$index) {

            $node->filter('ul li')->each(function ($node) use (&$leagues, &$index) {
                // $leagues[$index]['id'] = $node->attr('src');

                $node->filter('a .inner')->each(function ($node) use (&$leagues, &$index) {

                    $node->filter('.imgCntnr img')->each(function ($node) use (&$leagues, &$index) {
                        $leagues[$index]['image'] = $node->attr('src');
                    });
                    $node->filter('p')->each(function ($node) use (&$leagues, &$index) {
                        $leagues[$index]['tournament_name'] = $node->text();
                    });
                });
            });


            $index++;
        });


        return sendJsonResponse($leagues, 'leagues');
    }
}
