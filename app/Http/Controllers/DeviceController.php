<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceActionQueue;
use App\Models\DeviceGallery;
use App\Models\DeviceGalleryImage;
use App\Models\DeviceModel;
use App\Models\DeviceSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $action = DeviceActionQueue::ACTION_MAKE_PHOTO;
        $newStatus = DeviceActionQueue::STATUS_NEW;
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
            return redirect()->route('administration.user.device.list')->with('warning', 'Запит уже надіслано трішки раніше, очікуйте відповіді від пристрою.');
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

    public function userDeviceGalleryPhotos(Request $request, $galleryId): View
    {

        $deviceGallery = DeviceGallery::where('id', (int) $galleryId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $deviceGalleryImages = DeviceGalleryImage::where('gallery_id', $deviceGallery->id)
            ->where('user_id', Auth::id())
            ->get();

        return view('main.pages.administration.userDeviceGalleryPhotos', [
            'deviceGalleryImages' => $deviceGalleryImages,
            'pageTitle' => 'Галерея',
        ]);
    }

    public function userDeviceGalleryPhotoView(Request $request, $photoId)
    {
        $deviceGalleryImage = DeviceGalleryImage::where('id', (int) $photoId)->firstOrFail();

        // check if user is gallery owner:
        DeviceGallery::where('id', $deviceGalleryImage->gallery_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $path = Storage::path($deviceGalleryImage->original_image_url);

        //TODO check if file exit if not return default image for images which doesn't exist

        return response()->download($path);
    }

    public function userDeviceSettings(Request $request, $deviceId)
    {
        $device = Device::where('id', $deviceId)
            ->where('owner_user_id', Auth::id())
            ->where('is_active', 1)
            ->firstOrFail();

        return view('main.pages.administration.userDeviceSettings', [
            'device' => $device,
            'availablePhotoExtensions' => DeviceSettings::getAvailablePhotoExtensions(),
            'pageTitle' => 'Налаштування дівайсу',
        ]);
    }

    public function userDeviceSettingsSubmit(Request $request, $deviceId)
    {
        $device = Device::where('id', (int) $deviceId)
            ->where('owner_user_id', Auth::id())
            ->where('is_active', 1)
            ->firstOrFail();

        if (!empty($request->photo_extension) && is_string($request->photo_extension)
            && in_array($request->photo_extension, DeviceSettings::getAvailablePhotoExtensions())) {
            $device->setSettingDevicePhotoExtension($request->photo_extension);
        }

        return redirect()->route('administration.user.device.list')
            ->with('status', 'Налаштування дівайсу обновлені');
    }

}

