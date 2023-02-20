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
        $index=0;
        $matches=[];
        $data->filter('.matchesHpCntnr ul li')->each(function ($node) use(&$matches,&$index) {


           $node->filter('a .tourName')->each(function($node) use(&$matches,&$index){
            //   dd($node->text());
            $matches[$index]['championship_type']=$node->text();

           });
           $node->filter('a .teamA')->each(function($node) use(&$matches,&$index){
              $matches[$index]['first_team']=$node->text();
           });
           $node->filter('a .teamB img')->each(function($node) use(&$matches,&$index){
            $matches[$index]['first_image']=$node->attr('src');

           });

           $node->filter('a .teamB')->each(function($node) use(&$matches,&$index){
              $matches[$index]['second_team']=$node->text();
           });

           $node->filter('a .teamB img')->each(function($node) use(&$matches,&$index){
            $matches[$index]['second_image']=$node->attr('src');

           });

           $index++;
        });


     return sendJsonResponse($matches,'matches');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = $this->postService->createPost($request->all());
        return sendJsonResponse([], 'post add sucessfully');

    }

    public function update(Request $request, Post $post)
    {

        $post->update($request->all());
        if ($request->image) {
            $post->image = $this->uploadFile('uploads/posts', $request->image);
            $post->save();
        }
        return back()->with('status', "add successfully");
    }

    public function destroy(post $post)
    {
        $post = $this->postService->deletePost($post);

        return back()->with('status', "deleted successfully");
    }

}
