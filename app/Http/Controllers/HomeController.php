<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index($name)
    {
//        dd($name);
        $date = Carbon::now()->toDateString();
        $theme = 'blue';
        return view('home', compact('date','theme'));
//            ->with(['theme' => 'purple']);
    }
}

