<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DeviceController extends Controller
{

    public function userListDevices(Request $request): View
    {
        $devices = Device::where('owner_user_id', Auth::id())
            ->orderBy('created_at')
            ->get();

        $preparedDevices = [];
        foreach ($devices as $device) {
            $deviceModel = DeviceModel::where('id', $device->model_id)->first();
            $preparedDevices[] = [
                'deviceId' => $device->id,
                'modelName' => $deviceModel->name,
                'name' => $device->name,
                'modelImageUrl' => $deviceModel->image_url,
            ];
        }

        return view('main.pages.administration.userDevices', [
            'devices' => $preparedDevices
        ]);
    }

    public function userDeviceShop(Request $request): View {
        return view('main.pages.administration.userDeviceShop', [
            'shopDeviceModels' => DeviceModel::getShopDeviceModels(),
            'isPublicShop' => false,
        ]);
    }

}
