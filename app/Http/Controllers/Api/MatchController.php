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
        $parm_date = '%D9%85%D8%B1%D9%83%D8%B2-%D8%A7%D9%84%D9%85%D8%A8%D8%A7%D8%B1%D9%8A%D8%A7%D8%AA?date=' . $request->date;

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/match-center/' . $parm_date);
        $index = 0;
        $matches = [];
        $data->filter('.matchCard ')->each(function ($node) use (&$matches, &$index) {


            $node->filter('.tourTitle')->each(function ($node) use (&$matches, &$index) {

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


            $node->filter('.result .a')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_result'] = $node->text();
            });
            $node->filter('.matchResult p')->each(function ($node) use (&$match, &$index) {
                $match[$index]['status'] = $node->text();
            });
            $node->filter('.goal  a span.playerName')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_player'] = $node->text();
            });
            $node->filter('.goal  a span.time')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_time'] = $node->text();
            });

            $node->filter('.result .b')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_result'] = $node->text();
            });


            $node->filter('.matchScoreInfo .teamA a img')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_img'] = $node->attr('src');
            });
            $node->filter('.matchScoreInfo .teamA a')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_id'] = $node->attr('href');
            });
            $node->filter('.matchScoreInfo .teamA a p ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['first_team'] = $node->text();
            });

            $node->filter('.matchScoreInfo .teamB img ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_img'] = $node->attr('src');
            });
            $node->filter('.matchScoreInfo .teamB a ')->each(function ($node) use (&$match, &$index) {
                $match[$index]['second_id'] = $node->attr('href');
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

    public function matchCenter(Request $request)
    {
        $data = [];
        $client = new Client();
        $url = "https://www.yallakora.com/match-center/مركز-المباريات?date=" . $request->date . '#days';
        $crawler = $client->request('GET', $url);
        $crawler->filter('.matchCard.matchesList')->each(function ($node) use (&$data) {
            array_push($data,
                [
                    'name' => $node->filter('h2')->text(),
                    'matches' => [],
                ]);
            $node->filter('li')->each(function ($sub) use (&$data, $node) {

                array_push($data[array_key_last($data)]['matches'], [

                    'channel' => $sub->filter('.channel.icon-channel')->count() ? $sub->filter('.channel.icon-channel')->text() : null,

                    'date' => $sub->filter('.date')->text(),
                    'match_status' => $sub->filter('.matchStatus')->text(),
                    'match_time' => $sub->filter('.time')->text(),
                    'match_id' => $sub->filter('.leftCol')->filter('a')->attr('href'),
                    'team_a' => [
                        'name' => $sub->filter('.teams.teamA')->filter('p')->text(),
                        'image' => $sub->filter('.teams.teamA')->filter('img')->attr('src'),
                        'score' => $sub->filter('.score')->filter('span')->first()->text(),
                    ],
                    'team_b' => [
                        'name' => $sub->filter('.teams.teamB')->filter('p')->text(),
                        'image' => $sub->filter('.teams.teamB')->filter('img')->attr('src'),
                        'score' => $sub->filter('.score')->last()->text(),
                    ],

                ]);

            });

        });
        return response()->json($data);
    }

    public function statisticsMatch($id, $slug1, $slug2, $slug3, $slug4)
    {


        $param = $id . '/' . $slug1 . '/' . $slug2 . '/' . $slug3 . '/' . $slug4;

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $param);

        $index = 0;
        $match = [];
        $data->filter('.EuroMatchDetails .matchDetailsTabs .timeline.stats .cnts h3')->each(function ($node) use (&$match, &$index) {



            $node->filter('.previousMatch')->each(function ($node) use (&$match, &$index) {

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



    public function previousEncounter($param1, $param2, $param3, $param4)
    {
        $data = [];
        $team_a = [];
        $team_b = [];
        $matches_history = [];
        $matches_history2 = [];
        $team_a_situation = [];
        $team_b_situation = [];

        $client = new Client();

        $url2 = "https://www.yallakora.com/Match/GetTeamsHeadToHeadMatches?matchID=" . $param3;

        $crawler = $client->request('POST', $url2);
        $team_a['image'] = $crawler->filter('.team.teamA')->filter('img')->attr('src');
        $team_b['image'] = $crawler->filter('.team.teamB')->filter('img')->attr('src');

        $crawler->filter('li')->each(function ($node) use (&$team_a, &$team_b) {
            $team_a[$node->filter('.desc')->text()] = $node->filter('.team.teamA')->text();
            $team_b[$node->filter('.desc')->text()] = $node->filter('.team.teamB')->text();
        });
        $crawler->filter('.matchDtls')->each(function ($node) use (&$matches_history) {
            $team_a = $node->filter('.teamresult.team1');
            $team_b = $node->filter('.teamresult.team2');

            $matches_history = [
                'date' => $node->filter('.day')->text(),
                'team_a' => $team_a->filter('.teamName')->text(),
                'team_b' => $team_b->filter('.teamName')->text(),
                'team_a_result' => $team_a->filter('span')->text(),
                'team_b_result' => $team_b->filter('span')->text(),
                'league_name' => $node->filter('.leagueName')->text(),
            ];
        });
        $first = $crawler->filter('.wRow')->first();
        $first->filter('.item.dtls')->each(function ($sub) use (&$team_a_situation) {
            array_push($team_a_situation, $sub->text());
        });
        $last = $crawler->filter('.wRow')->last();
        $last->filter('.item.dtls')->each(function ($sub) use (&$team_b_situation) {
            array_push($team_b_situation, $sub->text());
        });

        $data = [
            'previous_matches' => $crawler->filter('.statsDiv')->filter('h2')->text(),
            'first_team' => $team_a,
            'second_team' => $team_b,
            'matches_history' => $matches_history,
            'team_a_situation' => $team_a_situation,
            'team_b_situation' => $team_b_situation,

        ];
        return response()->json($data);
    }







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
