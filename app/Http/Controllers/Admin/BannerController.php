<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner as ModelsBanner;
use App\Models\Category;
use App\Models\Post;
use App\Models\Translation\Banner;
use App\Traits\ImageTrait;
use File;
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
    public function index()
    {


        $banners = ModelsBanner::latest()->paginate(10);


        return view('admin.banners.index', compact('banners'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = ModelsBanner::create($request->all());
          $banner->type=$request->type;
        $banner->save();

        if ($request->file('image')) {
            $this->uploadImage('uploads/banners', $request->image);
            $banner->update(['image' => $request->image->hashName()]);
        }

        return back()->with('status', "add successfully");
    }

    public function update(Request $request, ModelsBanner $banner)
    {
        $banner->update($request->except('image'));
        $banner->type=$request->type;
        $banner->save();


        if ($request->file('image')) {
            $this->uploadImage('uploads/banners', $request->image);
            $banner->update(['image' => $request->image->hashName()]);
        }



        return back()->with('status', "add successfully");
    }

    public function destroy(ModelsBanner $banner)
    {
        if (!is_null($banner->image)) {
            Storage::disk('banners')->delete($banner->image);
        }
        $banner->delete();
        return back()->with('status', "deleted successfully");
    }
}
