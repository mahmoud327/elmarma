<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\NewResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\NewPage;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{



    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $news = Post::query()
            ->with(['category', 'medias'])

            ->latest()
            ->paginate(10);

        return JsonResponse::json('ok', ['data' => NewResource::collection($news)]);
    }
    public function show($id)
    {

        $new = NewPage::query()
            ->with(['category', 'medias'])
            ->findOrfail($id);

        return JsonResponse::json('ok', ['data' => NewResource::make($new)]);;
    }
}
