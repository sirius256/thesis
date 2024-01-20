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

}
