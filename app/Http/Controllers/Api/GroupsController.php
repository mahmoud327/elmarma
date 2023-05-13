<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade;

class GroupsController extends Controller
{
    public function index($param1, $param2,$param3,$param4,$param5=null)
    {
        $data=[];

        $url="https://www.yallakora.com/".$param1."/".$param2."/".$param3."/".$param4."/".$param5;


        $crawler = GoutteFacade::request('GET',$url);
        $crawler->filter('.groupItem')->each(function ($node) use (&$data) {
            array_push($data,
            [
                'group_name'=>$node->filter('.groupTtl')->text(),
                'teams'=>[],
            ]);
            $node->filter('.wRow')->each(function ($sub) use (&$data,$node) {
               $score=[];
            $sub->filter('.dtls')->each(function ($sub2) use (&$score) {
                array_push($score, $sub2->text());

            });





            array_push(  $data[array_key_last($data)]['teams'],[

                'name'=>$sub->filter('p')->text(),
            'image'=>$sub->filter('img')->attr('src'),
                'play'=>$score[0],
                'win'=>$score[1],
                'lose'=>$score[2],
                'points'=>$score[3],

            ]);

          });
             });


             return sendJsonResponse($data,'data');


    }
}
