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










    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
