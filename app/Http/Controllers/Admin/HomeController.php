<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\TournamentNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sucess = Post::get();


        // $all_works = Work::count();


     //    dd($sucess);
     //    $sucess = $sucess->count() / $all_works;




            $posts=Post::select(
                DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->
                groupBy(DB::raw('MONTH(created_at)'))->pluck('count');
            ;
            $months=Post::select(
            DB::raw("MONTH(created_at) as month"))->whereYear('created_at',date('Y'))->
            groupBy(DB::raw('MONTH(created_at)'))->pluck('month');

            $dates=array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months as $index=>$month)
            {

            $dates[$month]=$posts[$index];

            }

        $data = [
            'posts' => Post::count(),
            'sports_woman' => Post::where('type_post', 'sports-woman')->count(),
            'tournament_news' => TournamentNew::count(),
            'categories' => Category::count(),
            'dates'=>$dates,
            'sucess'=>$sucess

        ];
        return view('admin.index', $data);
    }
}
