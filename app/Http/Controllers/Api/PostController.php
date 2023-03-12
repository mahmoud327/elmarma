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
            ->when(request()->category_id, function ($q) {
                $q->whereCategoryId(request()->category_id);
            })
            ->when(request()->type, function ($q) {
                $q->whereType(request()->type);
            })
            ->with(['category','medias'])
            ->paginate(10);

        return JsonResponse::json('ok', ['data' => PostResource::collection($posts)]);
    }
    public function show($id)
    {

        $post = Post::query()
            ->active()
            ->with(['category','medias'])
            ->findorfail($id);

        return JsonResponse::json('ok', ['data' => PostResource::make($post)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
