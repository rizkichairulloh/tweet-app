<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $tweets = Tweet::latest()->paginate(5);
        $tweets = Tweet::latest()->paginate(4);

        return view('dashboard', compact('tweets'));
    }
}