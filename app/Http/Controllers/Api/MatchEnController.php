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



class MatchEnController extends Controller
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

        $data = $client->request('GET', 'https://sports.yahoo.com/soccer/');
        $index = 0;
        $matches = [];
        $data->filter('.scorestrip-wrapper  .gamelist  .Pb\(6px\)')->each(function ($node) use (&$matches, &$index) {


            // $node->filter('a ')->each(function ($node) use (&$matches, &$index) {
                $node->filter('.Flxg\(20\) .D\(f\) span:nth-of-type(1)')->each(function ($node) use (&$matches, &$index) {
                    $matches[$index]['match_status'] = $node->text();
                });

            $node->filter('.H\(24px\) .D\(f\)')->each(function ($node) use (&$matches, &$index) {

                $node->filter('img')->each(function ($node) use (&$matches, &$index) {

                    $matches[$index]['first_image'] = $node->attr('src');
                });

                $node->filter('.Fw\(500\)')->each(function ($node) use (&$matches, &$index) {
                    $matches[$index]['first_team'] = $node->text();
                });

                $node->filter('.Fw\(600\)\!')->each(function ($node) use (&$matches, &$index) {
                    $matches[$index]['seond_result'] = $node->text();
                });



            });

            $node->filter('.H\(24px\):nth-of-type(2) img')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['second_image'] = $node->attr('src');
            });
            $node->filter('.H\(24px\):nth-of-type(2) .Fw\(500\)')->each(function ($node) use (&$matches, &$index) {

                $matches[$index]['second_team'] = $node->text();
            });

            $node->filter('.Fw\(700\)\!')->each(function ($node) use (&$matches, &$index) {
                $matches[$index]['first_result'] = $node->text();
            });


            //  $node->filter('.Fw\(500\)')->each(function ($node) use (&$matches, &$index) {
            //     $matches[$index]['first_team'] = $node->text();
            // });

            // $node->filter('.Pend\(5px\):nt-child')->each(function ($node) use (&$matches, &$index) {


            //     $node->filter('img')->each(function ($node) use (&$matches, &$index) {
            //         $matches[$index]['secod_team'] = $node->attr('src');
            //     });

            //     // $matches[$index]['img2'] =
            // });


            // });
            //  $node->filter('img')->each(function ($node) use (&$matches, &$index) {

            //     $matches[$index]['img'] =$node->attr('src');
            // });

            // });
            // $node->filter('.Fw\(500\)')->each(function ($node) use (&$matches, &$index) {
            //     $matches[$index]['first_team'] = $node->text();
            // });


            // $node->filter('img:last-of-type ')->each(function ($node) use (&$matches, &$index) {
            //     $matches[$index]['img2'] =$node->attr('src');
            // });
            // $node->filter('a .teamB img')->each(function ($node) use (&$matches, &$index) {
            //     $matches[$index]['first_image'] = $node->attr('src');
            // });

            // $node->filter('a .teamB')->each(function ($node) use (&$matches, &$index) {
            //     $matches[$index]['second_team'] = $node->text();
            // });

            // $node->filter('a .teamB img')->each(function ($node) use (&$matches, &$index) {
            //     $matches[$index]['second_image'] = $node->attr('src');
            // });

            $index++;
        });


        return sendJsonResponse($matches, 'matches');
    }
}
