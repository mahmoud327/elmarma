<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::latest()
            ->active()
            ->with('category')
            ->paginate(10);

            return JsonResponse::json('ok', ['data' => PostResource::collection($posts)]);

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
            $post->image = $this->uploadImage('uploads/posts', $request->image);
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
