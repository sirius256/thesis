<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function dashboard(Request $request): View
    {
        return view('main.pages.admin.dashboard');
    }

}
