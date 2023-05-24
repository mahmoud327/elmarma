<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\NewPage;
use App\Models\Post;
use App\Services\newService;
use App\Traits\ImageTrait;
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

        $data = [
            'categories' => Category::latest()->get(),

            'news' => Post::latest()
                ->with('category')

                ->paginate(10),

        ];
        return view('admin.news.index', $data);
    }
    public function create()
    {

        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.news.create', $data);
    }
    /**
     * Store a NewPagely created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['type_post'] = 'news';
        $data = $request->all();


        $new = Post::create($data);

        if ($request->file('image')) {
            $new->image = $this->uploadImage('uploads/news/', $request->file('image'));
            $new->save();
        }

        if ($request->document) {

            foreach ($request->document as $file) {
                $new->medias()->create([
                    'url' => $file
                ]);
            }
        }

        return redirect(route('news.index'))->with('status', "add successfully");
    }

    public function edit($id)
    {

        $data = [
            'categories' => Category::latest()->get(),
            'new' => Post::find($id)


        ];
        return view('admin.news.edit', $data);
    }

    public function update(Request $request,$id)
    {
        $new=Post::find($id);

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

    public function destroy(Post $new)
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
        $filename = $this->uploadImage('uploads/news', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }


    public function deleteFile(Request $request)
    {
        $media = Media::where('id', $request->id)->first();

        if ($media) {

            $media->delete();
        } else {

            dd('dd');
            // \Storage::disk('s3')->delete($media->path);

        }

        return 'sucess';
    } /////////approve post//////////////////////////////////
}
