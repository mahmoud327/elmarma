<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Traits\ImageTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            $categories=Category::latest()->paginate(10);


        return view('admin.posts.categories.index',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Category::create($request->all());
        return back()->with('status', "add successfully");
    }

    public function update(Request $request, Category $category)
    {

        $category->update($request->all());


        return back()->with('status', "add successfully");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', "deleted successfully");
    }

}
