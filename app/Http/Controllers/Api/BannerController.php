<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BnnerResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $banners = Banner::latest()
            ->paginate($request->paginate);

        return JsonResponse::json('ok', ['data' => BnnerResource::collection($banners)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
