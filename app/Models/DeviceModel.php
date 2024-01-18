<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model {

    protected $table = 'device_models';

    /**
     * Check device existence
     *
     * @return bool
     */
    public function isDeviceAvailable(): bool
    {

        $devices = Device::where('model_id', $this->id)
            ->where('owner_user_id', null)
            ->first();

        return !empty($devices);
    }

    /**
     * @return bool
     */
    public static function isDeviceModelExist($deviceModelId): bool
    {
        $deviceModelId = (int) $deviceModelId;
        if (empty($deviceModelId)) {
            return false;
        }

        return !empty(DeviceModel::where('id', $deviceModelId)->first());
    }

    public static function getShopDeviceModels(): array
    {
        $shopDeviceModels = [];
        $deviceModels = DeviceModel::all();
        foreach ($deviceModels as $deviceModel) {
            $availableDevices = Device::where('model_id', $deviceModel->id)->where('owner_user_id', null)->get();
            $shopDeviceModels[] = [
                'modelId' => $deviceModel->id,
                'modelName' => $deviceModel->name,
                'modelDescription' => $deviceModel->description,
                'modelImageUrl' => $deviceModel->image_url,
                'deviceCount' => $availableDevices->count(),
            ];
        }

        return $shopDeviceModels;
    }


}
