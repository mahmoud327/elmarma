<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Requests\Website\ContactUsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Question;
use App\Models\Setting;

class WebSiteController extends Controller
{
    public function home()
    {
        $nationalities = Nationality::all();
        $courses=Course::all();
        return view('website.home-page', compact('nationalities', 'courses'));
    }

    public function whyUs()
    {
        return view('website.why-us');
    }

    public function courses()
    {
        $courses=Course::all();
        return view('website.courses',compact('courses'));
    }

    public function fees()
    {
        return view('website.fees');
    }

    public function faqs()
    {
        $questions = Question::all();
        return view('website.faqs', compact('questions'));
    }

    public function contactUs()
    {
        $nationalities = Nationality::all();
        return view('website.contact-us', compact('nationalities'));
    }

    public function contactUsCreate(ContactUsRequest $request)
    {
        ContactUs::create($request->validated());
        return back();
    }
}
