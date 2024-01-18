<?php

namespace App\Http\Controllers;

use App\Models\DeviceModel;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function userListOrders(Request $request): View
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at')
            ->get();

        return view('main.pages.administration.userOrders', [
            'orders' => $orders
        ]);
    }

    public function summaryOrder(Request $request, $modelId): View
    {
        $modelId = (int) $modelId;
        $deviceModel = DeviceModel::where('id', $modelId)->first();

        return view('main.pages.administration.summaryOrder', [
            'deviceModel' => $deviceModel,
        ]);
    }

    public function userViewOrder(Request $request, $orderId): View
    {
        $order = Order::where('user_id', Auth::id())
            ->where('id', $orderId)
            ->get()
            ->first();

        return view('main.pages.administration.userViewOder', [
            'order' => $order
        ]);
    }

}
