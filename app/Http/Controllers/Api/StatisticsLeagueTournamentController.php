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
            $node->filter('.goals .value:nth-of-type(2) span')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['goals_scored'] = (int)$node->text();

            });


            // $node->filter('.scorer .value span' )->each(function ($node) use (&$leagues, &$index) {

            //     $leagues[$index]['first_score'] =(int) $node->text();

            // });

            $node->filter('.scorer:first-child .playerImage .playerImg' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['first_image'] =$node->attr('src');

            });

            $node->filter('.scorer .value span' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['second_score'] = (int)$node->text();

            });

            $node->filter('.scorer > .label:contains("الهداف")  + .value span ' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['first_scorer'] = (int)$node->text();

            });
            $node->filter('.scorer > .label:contains("الهداف")  + .value  a ' )->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['name_scorer'] = $node->attr('title');

            });
            $node->filter('.scorer > .label:contains("الهداف")  + .value  a:nth-of-type(2) ' )->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['first_team_name'] = $node->attr('title');

            });
            $node->filter('.scorer > .label:contains("الهداف")  + .value  a:nth-of-type(2) img ' )->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['first_team_image'] = $node->attr('src');

            });

            $node->filter('.scorer > .label:contains("الهداف")  + .value  a:nth-of-type(2) ')->each(function ($node) use (&$leagues, &$index) {

                // dd('dd');

                $leagues[$index]['second_team_name'] = $node->attr('title');

            });
            // $node->filter('.scorer .value:nth-child(2) .info a:nth-of-type(2) img')->each(function ($node) use (&$leagues, &$index) {

            //     // dd('dd');

            //     $leagues[$index]['second_team_image'] = $node->attr('src');

            // });


            $node->filter('.scorer > .label:contains("صانع الأهداف")  + .value a:nth-of-type(2) img' )->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['second_image_team'] =$node->attr('src');

            });



            $node->filter('.scorer .value .info .name')->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['second_name_scorer'] = $node->text();

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
