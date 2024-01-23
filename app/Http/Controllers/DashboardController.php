<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        if ($request->user()->isHasModeratorRole()) {
            return redirect()->route('administration.moderator.dashboard');
        }

        if ($request->user()->isHasAdminRole()) {
            return redirect()->route('public.home');
        }

        return view('main.pages.administration.dashboard', [
            'pageTitle' => 'Головна',
            'user' => $request->user(),
        ]);
    }

}
