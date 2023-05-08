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


    public function playerDetail($slug, $slug2, $slug3, $slug4=null,$slug5=null)
    {


        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4. '/' . $slug5;

        $crawler = $client->request('GET', 'https://www.yallakora.com/' . $parm);


        $index = 0;
        $leagues = [];


        $crawler->filter('.euroHeader')->each(function ($node) use (&$leagues, &$index) {



            $node->filter(' .teamBGMain img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_background'] = $node->attr('src');

            });
            $node->filter(' .tourTtl .tourImg img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image'] = $node->attr('src');

            });

            $node->filter('.euroHeader .tourTtl h1')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['name'] = $node->text();

            });
            $node->filter('.teamData .data:first-child p')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['position'] = $node->text();

            });
            $node->filter('.teamData .data:nth-of-type(2) p')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['player_number'] = $node->text();

            });
            $node->filter('.teamData .data:nth-of-type(3) p')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['stadium'] = $node->text();

            });


            $node->filter('.owner-left')->each(function ($node) use (&$leagues, &$index) {



                $node->filter('.owner-img img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['club_image'] = $node->attr('src');

               });
                $node->filter('.owner-DT h2')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['club_name'] = $node->text();

               });


            });






            $index++;
        });







        return sendJsonResponse($leagues[0],'data');
    }


    public function details($slug, $slug2, $slug3, $slug4=null,$slug5=null)
    {


        $client = new Client();
        $parm = $slug . '/' . $slug2 . '/' . $slug3 . '/' . $slug4. '/' . $slug5;

        $data = $client->request('GET', 'https://www.yallakora.com/' . $parm);


        $index = 0;
        $leagues = [];
        $video = [];




        $data->filter('.euroHeader')->each(function ($node) use (&$leagues, &$index) {



            $node->filter(' .teamBGMain img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_background'] = $node->attr('src');

            });
            $node->filter(' .tourTtl .tourImg img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image'] = $node->attr('src');

            });

            $node->filter('.euroHeader .tourTtl h1')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['name'] = $node->text();

            });
            $node->filter('.teamData .data:first-child p')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['year_Founded'] = $node->text();

            });
            $node->filter('.teamData .data:nth-of-type(2) p')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['club_president'] = $node->text();

            });
            $node->filter('.teamData .data:nth-of-type(3) p')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['stadium'] = $node->text();

            });


            $node->filter('.owner-left')->each(function ($node) use (&$leagues, &$index) {



                $node->filter('.owner-img img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_technical_director'] = $node->attr('src');

               });
                $node->filter('.owner-DT h2')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['name_technical_director'] = $node->text();

               });


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
