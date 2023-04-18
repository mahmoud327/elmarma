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
    public function allMatch(Request $request)
    {
        $parm_date='%D9%85%D8%B1%D9%83%D8%B2-%D8%A7%D9%84%D9%85%D8%A8%D8%A7%D8%B1%D9%8A%D8%A7%D8%AA?date='.$request->date;

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/match-center/'.$parm_date);
        $index = 0;
        $matches = [];
        $data->filter('.matchCard')->each(function ($node) use (&$matches, &$index) {


            $node->filter('ul li a')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['id'] = $node->attr('href');
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

                $matches[$index]['tour'] = $node->text();
            });
            $node->filter('ul li a .allData .topData .matchStatus span')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['match_status'] = $node->text();
            });

            $node->filter('ul li a .teamA img')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['first_image'] = $node->attr('src');
            });
            $node->filter('ul li a .teamCntnr .MResult > .score')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['first_result'] = (int) $node->text();
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



            $node->filter('ul li a .teamCntnr .MResult:nth-last-child(2) ')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['second_result'] = (int) $node->text();
            });

            $node->filter('ul li a .MResult .time')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['game_time'] = $node->text();
            });

            $index++;
        });


        return sendJsonResponse($matches, 'matches');
    }


    public function show($id, $slug1, $slug2, $slug3, $slug4)
    {
        $param = $id . '/' . $slug1 . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $param);
        $index = 0;
        $match = [];

        $data->filter('.mtchDtlsRslt ul li ')->each(function ($node) use (&$match, &$index) {


            $node->filter('.tourNameBtn p')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_number'] = $node->text();
            });
            $node->filter('.tourName .tourNameBtn a:first-child')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_name'] = $node->text();
            });

            $node->filter('.tourName .tourNameBtn a:first-child')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_name'] = $node->text();
            });

            $node->filter('.tourNameBtn .date')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_date'] = $node->text();
            });
            $node->filter('.tourNameBtn .time')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_time'] = $node->text();
            });
            $node->filter('.matchScoreInfo .teamA a img')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_img'] = $node->attr('src');
            });
            $node->filter('.matchScoreInfo .teamA a p ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_team'] = $node->text();
            });

            $node->filter('.matchScoreInfo .teamB img ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_img'] = $node->attr('src');
            });
            $node->filter('.teamB p ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_team'] = $node->text();
            });
            $node->filter('.matchDetInfo .icon-stadium span:first-child')->each(function ($node) use (&$match, &$index) {
                $match[$index]['place'] = $node->text();
            });
            $node->filter('.matchDetInfo .icon-refree span:first-child')->each(function ($node) use (&$match, &$index) {
                $match[$index]['refree'] = $node->text();
            });

            $node->filter('.matchDetInfo .icon-channel  span')->each(function ($node) use (&$match, &$index) {
                $match[$index]['channel'] = $node->text();
            });
            $node->filter('.matchDetInfo .icon-refree  span')->each(function ($node) use (&$match, &$index) {
                $match[$index]['refree'] = $node->text();
            });
            $index++;
        });

        // $data->filter('.cnts')->each(function ($node) use (&$match, &$index) {


        //     $node->filter('.statsDiv ul li')->each(function ($node) use (&$match, &$index) {

        //         dd('ff');
        //         $match[$index]['first_team_win'] =$node->text();


        //     });
        //     // $node->filter('.teamB')->each(function ($node) use (&$match, &$index) {
        //     //     $match[$index]['second_team_win'] =$node->text();


        //     // });

        //     $index++;


        // });

        return sendJsonResponse($match[0], 'match');
    }

    public function statisticsMatch($id, $slug1, $slug2, $slug3, $slug4)
    {

        $param = $id . '/' . $slug1 . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/'.$param);
        $index = 0;
        $match = [];
        $data->filter('.timeline .cnts')->each(function ($node) use (&$match, &$index) {



            $node->filter('ul li ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_team_win'] = $node->text();
            });
            $node->filter('.tourNameBtn .date')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_date'] = $node->text();
            });
            $node->filter('.tourNameBtn .time')->each(function ($node) use (&$match, &$index) {
                $match[$index]['championship_time'] = $node->text();
            });
            $node->filter('.matchScoreInfo .teamA a img')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_img'] = $node->attr('src');
            });
            $node->filter('.matchScoreInfo .teamA a p ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_team'] = $node->text();
            });

            $node->filter('.matchScoreInfo .teamB img ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_img'] = $node->attr('src');
            });
            $node->filter('.teamB p ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_team'] = $node->text();
            });
            $node->filter('.matchDetInfo .icon-channel  span')->each(function ($node) use (&$match, &$index) {
                $match[$index]['channel'] = $node->text();
            });
            $node->filter('.matchDetInfo .icon-refree  span')->each(function ($node) use (&$match, &$index) {
                $match[$index]['refree'] = $node->text();
            });
            $index++;
        });

        // $data->filter('.cnts')->each(function ($node) use (&$match, &$index) {


        //     $node->filter('.statsDiv ul li')->each(function ($node) use (&$match, &$index) {

        //         dd('ff');
        //         $match[$index]['first_team_win'] =$node->text();


        //     });
        //     // $node->filter('.teamB')->each(function ($node) use (&$match, &$index) {
        //     //     $match[$index]['second_team_win'] =$node->text();


        //     // });

        //     $index++;


        // });

        return sendJsonResponse($match, 'match');
    }


    public function allTournament()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/match-center');
        $index = 0;
        $all_tournaments = [];
        $data->filter('.matchesCenter .filter option')->each(function ($node) use (&$all_tournaments, &$index) {


            $all_tournaments[$index]['tournament_name'] = $node->text();
            $all_tournaments[$index]['tournament_id'] = (int)$node->attr('value');


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
