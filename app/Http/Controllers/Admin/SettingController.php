<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Media;

class SettingController extends Controller
{

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.settings.edit', compact('setting'));
    }


    public function update(Request $request, Setting $setting )
    {
        $setting->update($request->all());
        return back()->with('status',"updated successfully");
    }

}
