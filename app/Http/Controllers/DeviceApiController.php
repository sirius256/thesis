<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceActionQueue;
use App\Models\DeviceGallery;
use App\Models\DeviceGalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeviceApiController extends Controller
{

    public function apiDeviceActionGet(Request $request)
    {
        $response = [
            'isError' => 0,
            'deviceActionQueue' => []
        ];

        $device = Device::where('hash', $request->device_hash)->firstOrFail();


        $deviceActionQueue = DeviceActionQueue::where('device_id', $device->id)
            ->where('status', DeviceActionQueue::STATUS_NEW)
            ->get();

        foreach ($deviceActionQueue as $queueItem) {
            $response['deviceActionQueue'][] = [
                'action_id' => $queueItem->id,
                'action' => $queueItem->action,
                'settings' => json_decode($queueItem->settings, true),
            ];
        }

        return response()->json($response);
    }

    public function apiDeviceActionPhotoSend(Request $request)
    {
        $response = [
            'isError' => 0,
            'message' => 'Photo submitted!'
        ];

        if (empty($request->action_id) || !is_string($request->action_id)) {
            $response['isError'] = 1;
            $response['message'] = 'action_id is required!';
            return response()->json($response);
        }

        $device = Device::where('hash', $request->device_hash)
            ->get()
            ->first();

        if (empty($device)) {
            $response['isError'] = 1;
            $response['message'] = 'Cannot find device!';
            return response()->json($response);
        }

        $deviceActionQueue = DeviceActionQueue::where('id', $request->action_id)
            ->where('status', DeviceActionQueue::STATUS_NEW)
            ->where('user_id',$device->owner_user_id)
            ->where('action', DeviceActionQueue::ACTION_MAKE_PHOTO)
            ->get()
            ->first();

        if (empty($deviceActionQueue)) {
            $response['isError'] = 1;
            $response['message'] = 'action_id doesn\'t exist!';
            return response()->json($response);
        }

        $photo = $request->file('photo');
        $photoExtension = $photo->getClientMimeType();
        $expectedFileExtension = $deviceActionQueue->getSettingPhotoExtension();

        if ($expectedFileExtension !== $photoExtension) {
            $response['isError'] = 1;
            $response['message'] = 'Wrong file extension!';
            return response()->json($response);
        }

        if (empty($photo)) {
            $response['isError'] = 1;
            $response['message'] = 'Photo is required!';
            return response()->json($response);
        }

        $pathToFolder = 'devices/' . $device->id . '/users/' . $device->owner_user_id . '';
        $pathToFile = Storage::putFile($pathToFolder , $photo);
        $deviceActionQueue->status = DeviceActionQueue::STATUS_COMPLETED;
        $deviceActionQueue->save();

        $deviceGallery = DeviceGallery::where('device_id', $device->id)
            ->where('user_id', $device->owner_user_id)
            ->get()
            ->first();

        if (empty($deviceGallery)) {
            $deviceGallery = new DeviceGallery();
            $deviceGallery->user_id = $device->owner_user_id;
            $deviceGallery->device_id = $device->id;
            $deviceGallery->name = 'Gallery for device ' . $device->id;
            $deviceGallery->save();
        }

        $deviceGalleryImage = new DeviceGalleryImage();
        $deviceGalleryImage->gallery_id = $deviceGallery->id;
        $deviceGalleryImage->original_image_url = $pathToFile;
        $deviceGalleryImage->low_size_image_url = $pathToFile;
        $deviceGalleryImage->save();

        return response()->json($response);
    }

}
