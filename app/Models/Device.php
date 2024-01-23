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
        if (!in_array($value, DeviceSettings::getAvailablePhotoExtensions())) {
            return;
        }

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
    }

    public function getDeviceMakePhotoSettings() {
        return [
            DeviceSettings::PHOTO_EXTENSION => $this->getSettingDevicePhotoExtension()
        ];
    }

    public function getPhotoCount() {
        $deviceGallery =  $this->getOrCreateGallery();

        if (empty($deviceGallery)) {
            return 0;
        }

        $deviceGalleryImages = DeviceGalleryImage::where('gallery_id', $deviceGallery->id)
            ->get();

        return count($deviceGalleryImages->toArray());
    }

    public function getGalleryId() {
        $deviceGallery = DeviceGallery::where('device_id', $this->id)
            ->where('user_id', $this->owner_user_id)
            ->firstOrFail();

        return $deviceGallery->id;
    }

    public function getOrCreateGallery() {
        $deviceGallery = DeviceGallery::where('device_id', $this->id)
            ->where('user_id', $this->owner_user_id)
            ->get()
            ->first();

        if (!empty($deviceGallery)) {
            return $deviceGallery;
        }

        $deviceGallery = new DeviceGallery();
        $deviceGallery->user_id = $this->owner_user_id;
        $deviceGallery->device_id = $this->id;
        $deviceGallery->name = 'Gallery for device ' . $this->id;
        $deviceGallery->save();

        return $deviceGallery;
    }

}
