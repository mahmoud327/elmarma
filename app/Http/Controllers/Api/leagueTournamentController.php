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

    public function details($slug, $slug2, $slug3, $slug4=null)
    {

        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parm);


        $index = 0;
        $leagues = [];
        $video = [];



        $data->filter('iframe')->each(function ($node) use (&$video, &$index) {

                $video[$index]['video'] = $node->attr('src');

        });

        dd($video);


        $data->filter('.spansorheader')->each(function ($node) use (&$leagues, &$index) {



            $node->filter('.euroHeader .tourTtl .tourImg img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image'] = $node->attr('src');

            });

            $node->filter('.euroHeader .tourTtl h1')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['name'] = $node->text();

            });
            $node->filter('.tabs a:contains("نتائج المباريات")')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['id_result_matxh'] = $node->attr('href');

            });

            $node->filter('.tabs a:contains("الهدافون")')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['id_scorer'] = $node->attr('href');

            });




            $index++;
        });
        if($leagues){
            $leagues=$leagues;
        }
        else{
            $leagues=$video;
        }


        return sendJsonResponse($leagues, 'leagues');
    }



    public function MatchResult($slug,$slug1,$slug2,$slug3)
    {
        $parms=$slug .'/'. $slug1.'/'.$slug2.'/'.$slug3;
        $client = new Client();


        $data = $client->request('GET', 'https://www.yallakora.com/'.$parms);


        $index = 0;
        $leagues = [];



        $data->filter('.rightside .matchesList  ul li')->each(function ($node) use (&$leagues, &$index) {


            $node->filter('.allData')->each(function ($node) use (&$leagues, &$index) {

                $node->filter('.topData .date span')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['game_time'] = $node->text();
                });
                $node->filter('.topData .date')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['date'] = $node->text();
                });
                $node->filter('.topData .matchStatus')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['match_status'] = $node->text();
                });

                $node->filter('.teamA  p')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['first_team'] = $node->text();
                });

                $node->filter('.teamA img')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['first_image'] = $node->attr('src');
                });




                $node->filter('.teamB  p')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['second_team'] = $node->text();
                });

                $node->filter('.teamB img')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['second_image'] = $node->attr('src');
                });


                $node->filter('.MResult:nth-last-child(2)')->each(function ($node) use (&$leagues, &$index) {
                    $leagues[$index]['score'] = $node->text();
                });
            });


            $index++;
        });


        return sendJsonResponse($leagues, 'result-matches');
    }


    public function Scorer($slug,$slug1,$slug2,$slug3)
    {
        $parms=$slug .'/'. $slug1.'/'.$slug2.'/'.$slug3;
        $client = new Client();


        $data = $client->request('GET', 'https://www.yallakora.com/'.$parms);


        $index = 0;
        $leagues = [];



        $data->filter('.standingSection .wRow')->each(function ($node) use (&$leagues, &$index) {




                $node->filter('.item .arrng')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['arrange_number'] = (int)$node->text();
                });

                $node->filter('.item .dtls')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['goal_numbers'] =(int) $node->text();
                });


                $node->filter('.player')->each(function ($node) use (&$leagues, &$index) {

                    $node->filter('.playerImg img')->each(function ($node) use (&$leagues, &$index) {
                        $leagues[$index]['player_image'] = $node->attr('src');
                    });

                    $node->filter('.team.player a:first-of-type ')->each(function ($node) use (&$leagues, &$index) {
                        $leagues[$index]['player_name'] = $node->attr('title');
                    });

                    $node->filter('.teamMob img')->each(function ($node) use (&$leagues, &$index) {
                        $leagues[$index]['team_image'] = $node->attr('src');
                    });
                    $node->filter('.teamMob p')->each(function ($node) use (&$leagues, &$index) {
                        $leagues[$index]['team_name'] = $node->text();
                    });


                });
                // $node->filter('.topData .matchStatus')->each(function ($node) use (&$leagues, &$index) {
                //     $leagues[$index]['status'] = $node->text();
                // });

                // $node->filter('.teamA  p')->each(function ($node) use (&$leagues, &$index) {
                //     $leagues[$index]['first_team_name'] = $node->text();
                // });

                // $node->filter('.teamA img')->each(function ($node) use (&$leagues, &$index) {
                //     $leagues[$index]['first_team_img'] = $node->attr('src');
                // });




                // $node->filter('.teamB  p')->each(function ($node) use (&$leagues, &$index) {
                //     $leagues[$index]['second_team_name'] = $node->text();
                // });

                // $node->filter('.teamB img')->each(function ($node) use (&$leagues, &$index) {
                //     $leagues[$index]['second_team_img'] = $node->attr('src');
                // });


                // $node->filter('.MResult:nth-last-child(2)')->each(function ($node) use (&$leagues, &$index) {
                //     $leagues[$index]['score'] = $node->text();
                // });


            $index++;
        });

        // $chunkedData = array_chunk($leagues, 10);


        return sendJsonResponse($leagues, 'result-matches');
    }
}
