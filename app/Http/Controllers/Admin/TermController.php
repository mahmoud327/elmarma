<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Media;
use App\Models\Term;

class TermController extends Controller
{

    public function edit($id)
    {
        $term = Term::find($id);
        return view('admin.terms.edit', compact('term'));
    }


    public function update(Request $request, Term $term )
    {
        $term->update($request->all());
        return back()->with('status',"updated successfully");
    }

}
