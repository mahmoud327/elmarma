<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewPage;
use App\Models\TournamentNew;
use App\Services\newService;
use App\Traits\ImageTrait;
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

        $data = [
            'categories' => Category::latest()->get(),

            'news' => TournamentNew::latest()
                ->with('category')
                ->paginate(10),

        ];
        return view('admin.tournament-news.index', $data);
    }
    public function create()
    {


        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.tournament-news.create', $data);
    }
    public function edit($id)
    {


        $data = [
            'categories' => Category::latest()->get(),
            'new' => TournamentNew::find($id)
        ];
        return view('admin.tournament-news.edit', $data);
    }
    /**
     * Store a NewPagely created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new = TournamentNew::create($data);

        if ($request->file('image')) {
            $new->image = $this->uploadImage('uploads/tournament_news/', $request->file('image'));
            $new->save();
        }

        if ($request->document) {

            foreach ($request->document as $file) {
                $new->medias()->create([
                    'url' => $file
                ]);
            }
        }

        return redirect(route('tournament-news.index'))->with('status', "add successfully");
    }

    public function update(Request $request,$id)
    {
       $new= TournamentNew::find($id);
        $new->update($request->all());
        if ($request->file('image')) {
            $new->image = $this->uploadImage('uploads/news/', $request->image);
            $new->save();
        }


        if ($request->document) {

            foreach ($request->document as $file) {
                $new->medias()->create([
                    'url' => $file
                ]);
            }
        }
        return back()->with('status', "add successfully");
    }

    public function destroy(NewPage $new)
    {
        if (!is_null($new->image)) {

            Storage::disk('news')->delete($new->image);
        }
        $new->delete();

        // $new = $this->newService->deletenew($new);

        return back()->with('status', "deleted successfully");
    }

    public function uploadNewImage(Request $request)
    {
        $file = $request->file('dzfile');
        $filename = $this->uploadImage('uploads/tournament_news', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
