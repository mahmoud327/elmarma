<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\NewResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\NewPage;
use App\Models\Post;
use App\Models\TournamentNew;
use App\Services\PostService;
use App\Traits\ImageTrait;
use ArinaSystems\JsonResponse\Facades\JsonResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TournamentNewController extends Controller
{



    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $news = TournamentNew::query()
            ->when(request()->title, function ($q) {

                $q->whereHas('category', function ($q) {
                    $q->whereTranslation('title',request()->title);
                });
            })

            ->with(['category', 'medias'])


            ->latest()
            ->paginate(10);

        return JsonResponse::json('ok', ['data' => NewResource::collection($news)]);
    }
    public function show($id)
    {

        $new = TournamentNew::query()
            ->with(['category', 'medias'])
            ->findOrfail($id);

        return JsonResponse::json('ok', ['data' => NewResource::make($new)]);;
    }
}
