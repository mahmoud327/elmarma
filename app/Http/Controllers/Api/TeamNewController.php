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
use SimpleXMLElement;

class TeamNewController extends Controller
{


    use ImageTrait;


    public function show($slug, $slug2, $slug3, $slug4, $slug5)
    {
        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4 . '/' . $slug5;


        $url2 = "https://www.yallakora.com/Match/MatchTemasNews2?matchID=".$slug4;


        $data = $client->request('POST', $url2);




        $index = 0;
        $leagues = [];



        $data->filter('.listing .cnts ul li')->each(function ($node) use (&$leagues, &$index) {



            $node->filter('.link a')->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['id'] = $node->attr('href');

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['image'] = $node->attr('data-src');
                    $leagues[$index]['title'] = $node->attr('alt');
                });
            });



            $node->filter('.link .time')->each(function ($node) use (&$leagues, &$index) {



                $node->filter('span:first-of-type')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['time'] = $node->text();
                });



                $node->filter('span')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['date'] = $node->text();
                });
            });


            $index++;
        });


        return sendJsonResponse($leagues, 'leagues');
    }

    public function teamVideos($slug, $slug2, $slug3, $slug4, $slug5)
    {
        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4 . '/' . $slug5;


        $url2 = "https://www.yallakora.com/Match/MatchTemasVideos?matchID=".$slug4;


        $data = $client->request('POST', $url2);




        $index = 0;
        $leagues = [];



        $data->filter('.listing .cnts ul li')->each(function ($node) use (&$leagues, &$index) {



            $node->filter('a')->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['id'] = $node->attr('href');

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['image'] = $node->attr('src');
                    $leagues[$index]['title'] = $node->attr('alt');
                });
            });



            $node->filter('.link .time')->each(function ($node) use (&$leagues, &$index) {



                $node->filter('span:first-of-type')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['time'] = $node->text();
                });



                $node->filter('span')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['date'] = $node->text();
                });
            });


            $index++;
        });


        return sendJsonResponse($leagues, 'leagues');
    }


    public function detailsVideo($slug, $slug2, $slug3, $slug4 = null, $slug5 = null)
    {

        $parms = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4 . '/' . $slug5;
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parms);


        $index = 0;
        $videos = [];
        $data->filter('.socialMargin')->each(function ($node) use (&$videos, &$index) {




            $node->filter('h1')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['title'] = $node->text();
            });

            $node->filter('.time span:nth-last-child(2)')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['date'] = $node->text();
            });
            $node->filter('.time span')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['time'] = $node->text();
            });
            $node->filter('.videoCntnr iframe')->each(function ($node) use (&$videos, &$index) {



                $videos[$index]['video'] = $node->attr('src');
            });
            // $node->filter('.link .desc p')->each(function ($node) use (&$videos, &$index) {

            //     $videos[$index]['desc'] = $node->text();
            // });


            $index++;
        });


        return sendJsonResponse($videos, 'videos');
    }












    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
