<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Goutte\Client;

class
LatestTransferController extends Controller
{


    public function index($parm)
    {
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/transfer-list/%d8%ac%d9%85%d9%8a%d8%b9-%d8%a7%d9%84%d8%a5%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/' . $parm);

        $index = 0;
        $leagues = [];



        $data->filter('.standing:not(.left) .table  .wRow')->each(function ($node) use (&$leagues, &$index) {


            // $node->filter('')->each(function ($node) use (&$leagues, &$index) {

            $node->filter(' div.item.var')->each(function ($node) use (&$leagues, &$index) {

                // $leagues[$index]['image_team_to'] ='dd';

                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_to'] = $node->text();
                });



                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_to'] = $node->attr('src');
                });



                // });




            });

            $node->filter('div.item.var.fromTeam')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_from'] = $node->text();
                });

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_from'] = $node->attr('src');
                });
            });

            $node->filter('.item.fixed:first-child')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['date'] = $node->text();
            });
            $node->filter('.item.fixed')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['status'] = $node->text();
            });
            $node->filter('div.item.var:first-child')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_name'] = $node->text();
                });
                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_image'] = $node->attr('src');
                });
            });

            // });



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }
    public function importantTransfer($parm)
    {
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/transfer-list/%d8%ac%d9%85%d9%8a%d8%b9-%d8%a7%d9%84%d8%a5%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/' . $parm);

        $index = 0;
        $leagues = [];



        $data->filter('.standing.left .wRow')->each(function ($node) use (&$leagues, &$index) {


            // $node->filter('')->each(function ($node) use (&$leagues, &$index) {

            $node->filter(' div.item.var')->each(function ($node) use (&$leagues, &$index) {

                // $leagues[$index]['image_team_to'] ='dd';

                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_to'] = $node->text();
                });



                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_to'] = $node->attr('src');
                });



                // });




            });

            $node->filter('div.item.var.fromTeam')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_from'] = $node->text();
                });

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_from'] = $node->attr('src');
                });
            });

            $node->filter('.item.fixed:first-child')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['date'] = $node->text();
            });
            $node->filter('.item.fixed')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['status'] = $node->text();
            });
            $node->filter('div.item.var:first-child')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_name'] = $node->text();
                });
                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_image'] = $node->attr('src');
                });
            });

            // });



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }

    public function allLeague()
    {
        $client = new Client();

        $data = $client->request('GET', 'https://www.yallakora.com/transfer');


        $index = 0;
        $leagues = [];



        $data->filter('.cd-filter-block  .cd-select select option')->each(function ($node) use (&$leagues, &$index) {
            $leagues[$index]['tournament_name'] = $node->text();
            $leagues[$index]['id'] = (int)$node->attr('value');



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }


    public function latestNew(Request $request, $param1, $param2, $param4)

    {
        $param = 'https://www.yallakora.com/transfer/news/%d8%a3%d8%ae%d8%a8%d8%a7%d8%b1-%d8%a7%d9%84%d8%a3%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/' . $request->id;



        $client = new Client();

        $data = $client->request('GET', $param);
        $leagues = [];
        $index = 0;
        $leagues = [];



        $data->filter('.listing .cnts ul li')->each(function ($node) use (&$leagues, &$index) {


            // $node->filter('')->each(function ($node) use (&$leagues, &$index) {

            $node->filter('.link')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('a')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['id'] = $node->attr('href');
                });




                $node->filter('a img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image'] = $node->attr('data-src');
                    $leagues[$index]['title'] = $node->attr('alt');
                });
                $node->filter('.desc  span:first-of-type')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['date'] = $node->text();
                });
                $node->filter('.desc  span')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['time'] = $node->text();
                });



                // });




            });

            $node->filter('div.item.var.fromTeam')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_from'] = $node->text();
                });

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_from'] = $node->attr('src');
                });
            });

            $node->filter('.item.fixed:first-child')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['date'] = $node->text();
            });
            $node->filter('.item.fixed')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['status'] = $node->text();
            });
            $node->filter('div.item.var:first-child')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_name'] = $node->text();
                });
                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_image'] = $node->attr('src');
                });
            });

            // });



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }

    public function importantTopic(Request $request, $param1, $param2, $param4)

    {
        $param = 'https://www.yallakora.com/transfer/news/%d8%a3%d8%ae%d8%a8%d8%a7%d8%b1-%d8%a7%d9%84%d8%a3%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/' . $request->id;



        $client = new Client();

        $data = $client->request('GET', $param);
        $leagues = [];
        $index = 0;
        $leagues = [];





        $data->filter('.interestedArticles ul li')->each(function ($node) use (&$leagues, &$index) {








            $node->filter('a')->each(function ($node) use (&$leagues, &$index) {


                $leagues[$index]['id'] = $node->attr('href');

                $node->filter('.num')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['number'] = $node->text();
                });

                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['title'] = $node->text();
                });




                // $node->filter('a img')->each(function ($node) use (&$leagues, &$index) {

                //     $leagues[$index]['image'] = $node->attr('data-src');
                //     $leagues[$index]['title'] = $node->attr('alt');
                // });
                // $node->filter('.desc  span:first-of-type')->each(function ($node) use (&$leagues, &$index) {


                //     $leagues[$index]['date'] = $node->text();
                // });
                // $node->filter('.desc  span')->each(function ($node) use (&$leagues, &$index) {


                //     $leagues[$index]['time'] = $node->text();
                // });



                // });




            });










            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }


    public function homeTop(Request $request)

    {
        $param = 'https://www.yallakora.com/transfer/%d8%a3%d8%ae%d8%a8%d8%a7%d8%b1-%d8%a7%d9%84%d8%a3%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/' . $request->id;



        $client = new Client();

        $data = $client->request('GET', $param);
        $leagues = [];
        $index = 0;
        $leagues = [];



        $data->filter('.pattern3 .cnts ul li')->each(function ($node) use (&$leagues, &$index) {


            // $node->filter('')->each(function ($node) use (&$leagues, &$index) {

            $node->filter('.link')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('a')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['id'] = $node->attr('href');
                });




                $node->filter('a img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image'] = $node->attr('data-src');
                });
                $node->filter('.desc  span:first-of-type')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['date'] = $node->text();
                });
                $node->filter('.desc  span')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['time'] = $node->text();
                });
                $node->filter('.desc  h3')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['title'] = $node->text();
                });



                // });




            });

            $node->filter('div.item.var.fromTeam')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_from'] = $node->text();
                });

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_from'] = $node->attr('src');
                });
            });

            $node->filter('.item.fixed:first-child')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['date'] = $node->text();
            });
            $node->filter('.item.fixed')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['status'] = $node->text();
            });
            $node->filter('div.item.var:first-child')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_name'] = $node->text();
                });
                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_image'] = $node->attr('src');
                });
            });

            // });



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }
    public function homeBottom(Request $request, $param1, $param2, $param4)

    {
        $param = 'https://www.yallakora.com/transfer/%d8%a3%d8%ae%d8%a8%d8%a7%d8%b1-%d8%a7%d9%84%d8%a3%d9%86%d8%aa%d9%82%d8%a7%d9%84%d8%a7%d8%aa/' . $request->id;



        $client = new Client();

        $data = $client->request('GET', $param);
        $leagues = [];
        $index = 0;
        $leagues = [];



        $data->filter('.pattern1 .cnts ul li')->each(function ($node) use (&$leagues, &$index) {


            // $node->filter('')->each(function ($node) use (&$leagues, &$index) {

            $node->filter('.link')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('a')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['id'] = $node->attr('href');
                });




                $node->filter('a img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image'] = $node->attr('data-src');
                });
                $node->filter('.desc  span:first-of-type')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['date'] = $node->text();
                });
                $node->filter('.desc  span')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['time'] = $node->text();
                });
                $node->filter('.desc  h3')->each(function ($node) use (&$leagues, &$index) {


                    $leagues[$index]['title'] = $node->text();
                });



                // });




            });

            $node->filter('div.item.var.fromTeam')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['transfare_from'] = $node->text();
                });

                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['image_team_from'] = $node->attr('src');
                });
            });

            $node->filter('.item.fixed:first-child')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['date'] = $node->text();
            });
            $node->filter('.item.fixed')->each(function ($node) use (&$leagues, &$index) {

                $leagues[$index]['status'] = $node->text();
            });
            $node->filter('div.item.var:first-child')->each(function ($node) use (&$leagues, &$index) {


                $node->filter('p')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_name'] = $node->text();
                });
                $node->filter('img')->each(function ($node) use (&$leagues, &$index) {

                    $leagues[$index]['player_image'] = $node->attr('src');
                });
            });

            // });



            $index++;
        });


        return sendJsonResponse($leagues, 'all-leagues');
    }
}
