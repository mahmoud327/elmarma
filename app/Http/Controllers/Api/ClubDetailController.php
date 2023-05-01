<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class ClubDetailController extends Controller
{



    public function tabs($slug, $slug2, $slug3, $slug4=null,$slug5=null)
    {


        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4. '/' . $slug5;

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parm);


        $index = 0;
        $leagues = [];
        $video = [];



        $data->filter('iframe')->each(function ($node) use (&$video, &$index) {

                $video[$index]['video'] = $node->attr('src');

        });



        $data->filter('.tabs')->each(function ($node) use (&$leagues, &$index) {



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



}
