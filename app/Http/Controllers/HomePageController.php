<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index($name)
    {
        $date = Carbon::now()->toDateString();
        $theme = 'blue';
        return view('home', compact('date', 'name','theme'))->with(['theme' => 'purple']);
    }
}

