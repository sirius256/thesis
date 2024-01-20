<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModeratorController extends Controller
{

    public function dashboard(Request $request): View {
        $orders = Order::all();

        return view('main.pages.administration.moderatorDashboard', [
            'orders' => $orders,
            'completeStatusId' => Status::getCompleteStatusId(),
        ]);
    }

}
