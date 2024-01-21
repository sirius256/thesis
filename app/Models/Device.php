<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

    public function getModelName() {
        $deviceModel = DeviceModel::where('id', $this->model_id)->firstOrFail();

        return $deviceModel->name;
    }

    public function getModelImageUrl() {
        $deviceModel = DeviceModel::where('id', $this->model_id)->firstOrFail();

        return $deviceModel->image_url;
    }

    public function getSettingDevicePhotoExtension() {
        $deviceSettings = DeviceSettings::where('device_id', $this->id)->get();
        foreach ($deviceSettings as $deviceSetting) {
            if ($deviceSetting->name === DeviceSettings::PHOTO_EXTENSION) {
                return $deviceSetting->value;
            }
        }

        return DeviceSettings::DEFAULT_PHOTO_EXTENSION;
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSettingDevicePhotoExtension(string $value) {
        foreach (DeviceSettings::where('device_id', $this->id)->get() as $deviceSettingItem) {
            if ($deviceSettingItem->name === DeviceSettings::PHOTO_EXTENSION) {
                $deviceSetting = DeviceSettings::where('id', $deviceSettingItem->id)->first();
                $deviceSetting->value = $value;
                $deviceSetting->save();
                return;
            }
        }

        $deviceSetting = new DeviceSettings();
        $deviceSetting->device_id = $this->id;
        $deviceSetting->label = 'Тип фото';
        $deviceSetting->name = DeviceSettings::PHOTO_EXTENSION;
        $deviceSetting->value = $value;
        $deviceSetting->save();

        return $deviceSetting->value;
    }

    public function getDeviceMakePhotoSettings() {
        return [
            DeviceSettings::PHOTO_EXTENSION => $this->getSettingDevicePhotoExtension()
        ];
    }

}
