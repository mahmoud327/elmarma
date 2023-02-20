<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
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

        $data = [
            'categories' => Category::latest()->get(),

            'posts' => Post::latest()
                ->with('category')
                ->paginate(10),

        ];
        return view('admin.posts.index', $data);
    }
    public function create()
    {

        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.posts.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post = $this->postService->createPost($data);

        return redirect(route('posts.index'))->with('status', "add successfully");
    }

    public function update(Request $request, Post $post)
    {

        $post->update($request->all());
        if ($request->image) {
            $post->image = $this->uploadImage('uploads/posts/', $request->image);
            $post->save();
        }
        return back()->with('status', "add successfully");
    }

    public function destroy(post $post)
    {
         $post->delete();
        // $post = $this->postService->deletePost($post);

        return back()->with('status', "deleted successfully");
    }

}
