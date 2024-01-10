<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function home(Request $request): View
    {
        return view('main.pages.public.home');
    }

}
