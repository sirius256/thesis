<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceActionQueue;
use App\Models\DeviceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DeviceController extends Controller
{

    public function userListDevices(Request $request): View
    {
        $devices = Device::where('owner_user_id', Auth::id())
            ->where('is_active', 1)
            ->orderBy('created_at')
            ->get();

        return view('main.pages.administration.userDevices', [
            'devices' => $devices,
            'pageTitle' => 'Мої пристрої',
        ]);
    }

    public function userDeviceShop(Request $request): View {
        return view('main.pages.administration.userDeviceShop', [
            'shopDeviceModels' => DeviceModel::getShopDeviceModels(),
            'isPublicShop' => false,
            'pageTitle' => 'Магазин',
        ]);
    }

    public function userDeviceMakePhoto(Request $request, $deviceId) {
        $device = Device::where('id', (int) $deviceId)->firstOrFail();
        $action = 'make_photo';
        $newStatus = 'new';
        $settings = json_encode($device->getDeviceMakePhotoSettings());

        $queue = DeviceActionQueue::where('action', $action)
            ->where('user_id', Auth::id())
            ->where('device_id', $device->id)
            ->where('status', $newStatus)
            ->where('settings', $settings)
            ->get()
            ->first();

        $isQueueAlreadyExist = !empty($queue);

        if ($isQueueAlreadyExist) {
            /// message return already sed
            return redirect()->route('administration.user.device.list')->with('status', 'Запит уже надіслано трішки раніше, очікуйте відповіді від пристрою.');
        }

        $deviceActionQueue = new DeviceActionQueue();
        $deviceActionQueue->action = $action;
        $deviceActionQueue->user_id = Auth::id();
        $deviceActionQueue->device_id = $device->id;
        $deviceActionQueue->status = $newStatus;
        $deviceActionQueue->settings = $settings;
        $deviceActionQueue->save();

        return redirect()->route('administration.user.device.list')->with('status', 'Надіслано запит на створення фото, очікуйте відповіді від пристрою.');
    }

}

