<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportPostController extends Controller
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

            'posts' => Post::latest()
                ->where('type_post', 'sports-woman')
                ->with('category')

                ->paginate(10),

        ];
        return view('admin.posts.sports-woman.index', $data);
    }
    public function create()
    {

        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.posts.sports-woman.create', $data);
    }
    public function edit($id)
    {

        $data = [
            'categories' => Category::latest()->get(),
            'new' => Post::find($id)
        ];
        return view('admin.posts.sports-woman.edit', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['type_post'] = 'sports-woman';
        $data = $request->all();

        $post = Post::create($data);
        if ($request->image) {
            $post->image = $this->uploadImage('uploads/posts/', $request->file('image'));
            $post->save();
        }

        if ($request->document) {

            foreach ($request->document as $file) {
                $post->medias()->create([
                    'url' => $file
                ]);
            }

            $post->medias()->create([
                'url' => $post->image
            ]);
        }


        return redirect(route('sports-woman.index'))->with('status', "add successfully");
    }



    public function destroy(post $post)
    {
        $post->delete();
        // $post = $this->postService->deletePost($post);

        return back()->with('status', "deleted successfully");
    }

    public function uploadPostImage(Request $request)
    {
        $file = $request->file('dzfile');
        $filename = $this->uploadImage('uploads/posts/', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $new = Post::find($id);

        $new->update($request->all());
        if ($request->file('image')) {
            $new->image = $this->uploadImage('uploads/posts/', $request->image);
            $new->save();
        }

        if ($request->document) {

            foreach ($request->document as $file) {
                $new->medias()->create([
                    'url' => $file
                ]);
            }
        }


        return redirect(route('sports-woman.index'))->with('status', "add successfully");
    }
}
