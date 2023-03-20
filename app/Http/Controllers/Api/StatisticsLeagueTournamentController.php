<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class StatisticsLeagueTournamentController extends Controller
{




    public function show($slug, $slug2, $slug3, $slug4,$slug5=null)
    {

        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4 .'/'.$slug5;

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parm);


        $index = 0;
        $leagues = [];



        $data->filter('.statsSection')->each(function ($node) use (&$leagues, &$index) {
            $leagues[$index]['count_matches'] ='dd';

            // // $node->filter(function ($value, $key) {
            // //     return $value > 2;
            // // });


            $node->filter('.statsItems .matches .value span ')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['count_matches'] = (int)$node->text();

            });
            $node->filter('.goals .value span')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['count_goals'] = (int)$node->text();

            });


            $node->filter('.scorer .value >span' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['first_score'] =(int) $node->text();

            });

            $node->filter('.scorer .playerImage .playerImg' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['first_image'] =$node->attr('src');

            });

            $node->filter('.scorer .value span' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['secont_score'] = (int)$node->text();

            });

            $node->filter('.scorer .playerImage .playerImg' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['first_image'] =$node->attr('src');

            });
            $node->filter('.scorer .value .info a .name' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['count_goals'] = $node->text();

            });

            $node->filter('.scorer .value .info .team img' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['team_image'] =$node->attr('src');

            });



            $node->filter('.scorer .value .info .name')->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['first_scorer_name'] = $node->text();

            });
            $node->filter('.scorer .value .info .name:nth-last-child(2)')->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['game_maker'] = $node->text();

            });



            $index++;
        });


        return sendJsonResponse($leagues, 'leagues');
    }

    // public function show($slug, $slug2, $slug3, $slug4,$slug5=null)
    // {
    //  $client = new Client();
    //     $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4 .'/'.$slug5;

    //     $data = $client->request('GET', 'https://www.yallakora.com/' . $parm);






    //     $index = 0;
    //     $videos = [];
    //     $data->filter('.statsSection')->each(function ($node) use (&$videos, &$index) {



    //         $node->filter('ul li .matches .value span')->each(function ($node) use (&$videos, &$index) {

    //             $videos[$index]['title'] = $node->attr('title');
    //         });
    //         // $node->filter('.link .imageCntnr img')->each(function ($node) use (&$videos, &$index) {

    //         //     $videos[$index]['image'] = $node->attr('data-src');
    //         // });




    //         $index++;
    //     });


    //     return sendJsonResponse($videos, 'videos');
    // }


}
