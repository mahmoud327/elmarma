<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $contacts = ContactUs::orderby('id', 'desc')->get();
        return view('admin.contact_us.index', compact('contacts'));
    }
}
