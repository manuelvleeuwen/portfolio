<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        $projects = config('projects');

        return view('projects', compact('projects'));
    }

    public function contact()
    {
        return view('contact');
    }
}
