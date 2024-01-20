<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceModel;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\Status;
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
            'orders' => $orders,
            'pageTitle' => 'Мої замовлення',
            'completeStatusId' => Status::getCompleteStatusId(),
        ]);
    }

    public function summaryOrder(Request $request, $modelId): View
    {
        $deviceModel = DeviceModel::findOrFail((int) $modelId);

        return view('main.pages.administration.summaryOrder', [
            'deviceModel' => $deviceModel,
            'pageTitle' => 'Підтвердити замовлення',
        ]);
    }

    public function summaryOrderSubmit(Request $request, $modelId): \Illuminate\Http\RedirectResponse
    {
        $deviceModel = DeviceModel::findOrFail((int) $modelId);
        $device = Device::where('owner_user_id', null)
            ->where('model_id', $deviceModel->id)
            ->firstOrFail();

        $device->owner_user_id = Auth::id();
        $device->save();

        $order = new Order();
        $order->setStatus(Status::ORDER_STATUS_NEW);
        $order->user_id = Auth::id();
        $order->device_id = $device->id;
        $order->save();


        $orderLog = new OrderLog();
        $orderLog->order_id = $order->id;
        $orderLog->auto_comment = 'Створено нове замовлення номер ' . $order->id . '. Очікуйте, скоро з вами зв\'яжетіся адміністратор.';
        $orderLog->save();

        return redirect()->route('administration.user.order.list');
    }

    public function userViewOrder(Request $request, $orderId): View
    {
        $order = Order::where('id', (int) $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $orderLogs = OrderLog::where('order_id', $order->id)
            ->orderBy('created_at')
            ->get();

        $device = Device::findOrFail($order->device_id);

        return view('main.pages.administration.userViewOder', [
            'order' => $order,
            'orderLogs' => $orderLogs,
            'pageTitle' => 'Перегляд замовлення номер ' . $order->id,
            'device' => $device,
        ]);
    }

    public function moderatorViewOrder(Request $request, $orderId): View
    {
        $order = Order::where('id', (int) $orderId)
            ->firstOrFail();

        $orderLogs = OrderLog::where('order_id', $order->id)
            ->orderBy('created_at')
            ->get();

        $device = Device::findOrFail($order->device_id);

        return view('main.pages.administration.moderatorViewOrder', [
            'order' => $order,
            'orderLogs' => $orderLogs,
            'device' => $device,
        ]);
    }

    public function moderatorCompleteOrderSubmit(Request $request, $orderId) {
        $order = Order::where('id', (int) $orderId)
            ->firstOrFail();

        $device = Device::findOrFail($order->device_id);
        $device->is_active = 1;
        $device->save();

        $order->setStatus(Status::ORDER_STATUS_COMPLETE);
        $order->save();

        $orderLog = new OrderLog();
        $orderLog->order_id = $order->id;
        $orderLog->auto_comment = 'Пристрій активовано.';
        $orderLog->save();

        $orderLog = new OrderLog();
        $orderLog->order_id = $order->id;
        $orderLog->auto_comment = 'Замовлення виконанею';
        $orderLog->save();

        return redirect()->route('administration.moderator.dashboard');
    }

}
