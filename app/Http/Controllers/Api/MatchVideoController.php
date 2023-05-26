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

class MatchVideoController extends Controller
{


    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //     $client = new Client();

    //     $data = $client->request('GET', 'https://www.filgoal.com/');
    //     $index = 0;
    //     $teams = [];
    //     $data->filter('.row .champ_grid')->each(function ($node) use (&$teams, &$index) {
    //         dd('dd');

    //         $node->filter('ul li')->each(function ($node) use (&$teams, &$index) {

    //       $node->filter('a')->each(function ($node) use (&$teams, &$index) {

    //             $teams[$index]['id'] = $node->attr('href');
    //             $teams[$index]['tema_name'] = $node->text();
    //         });



    //         });

    //         $index++;
    //     });


    //     return sendJsonResponse($teams, 'matches');
    // }
    public function index()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/');



        $index = 0;
        $videos = [];
        $data->filter('.pattern2 ul li')->each(function ($node) use (&$videos, &$index) {



            $node->filter('.link')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['id'] = $node->attr('href');
                $videos[$index]['title'] = $node->attr('title');
            });
            $node->filter('.link .imageCntnr img')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['image'] = $node->attr('data-src');
            });




            $index++;
        });


        return sendJsonResponse($videos, 'videos');
    }


    public function allVideo()
    {

        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/videos/%d9%81%d9%8a%d8%af%d9%8a%d9%88%d9%87%d8%a7%d8%aa');



        $index = 0;
        $videos = [];
        $data->filter('.cnts ul li')->each(function ($node) use (&$videos, &$index) {



            $node->filter('.link')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['id'] = $node->attr('href');
                $videos[$index]['title'] = $node->attr('title');
            });

            $node->filter('.link .imageCntnr img')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['image'] = $node->attr('src');
            });
            $node->filter('.link .desc span')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['date'] = $node->text();
            });
            $node->filter('.link .desc p')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['desc'] = $node->text();
            });


            $index++;
        });


        return sendJsonResponse($videos, 'videos');
    }


    public function detailsVideo($slug, $slug2, $slug3, $slug4 = null, $slug5 = null)
    {

        $parms = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4 . '/' . $slug5;
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parms);


        $index = 0;
        $videos = [];
        $data->filter('.socialMargin')->each(function ($node) use (&$videos, &$index) {


            $node->filter('.videoCntnr .twitter-tweet a')->each(function ($node) use (&$videos, &$index) {



                $videos[$index]['video'] = $node->attr('href');
            });


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
            $node->filter('.ArticleDetails p:first-of-type')->each(function ($node) use (&$videos, &$index) {



                $videos[$index]['content'] = $node->text();
            });

            $node->filter('.imageCntnr img')->each(function ($node) use (&$videos, &$index) {



                $videos[$index]['image'] = $node->attr('src');
            });
            // $node->filter('.link .desc p')->each(function ($node) use (&$videos, &$index) {

            //     $videos[$index]['desc'] = $node->text();
            // });


            $index++;
        });


        return sendJsonResponse($videos, 'videos');
    }

    public function RelatedtVideo($slug, $slug2, $slug3,$slug4=null,$slug5=null)
    {

        $parms = $slug . '/' . $slug2 . '/' . $slug3. '/' . $slug4. '/' . $slug5;
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parms);


        $index = 0;
        $videos = [];
        $data->filter('.subCat .cnts ul li')->each(function ($node) use (&$videos, &$index) {



            $node->filter('.link')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['id'] = $node->attr('href');
                $videos[$index]['title'] = $node->attr('title');
            });

            $node->filter('.link .imageCntnr img')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['image'] = $node->attr('src');
            });
            $node->filter('.link .desc span')->each(function ($node) use (&$videos, &$index) {

                $videos[$index]['date'] = $node->text();
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
