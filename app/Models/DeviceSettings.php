<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSettings extends Model {

   const PHOTO_EXTENSION = 'photo_extension';
   const DEFAULT_PHOTO_EXTENSION = 'jpg';

   public static function getDevicePhotoExtension($deviceId) {
       $deviceSettings = DeviceSettings::where('device_id', (int) $deviceId)->get();
       foreach ($deviceSettings as $deviceSetting) {
           if ($deviceSetting->name === DeviceSettings::PHOTO_EXTENSION) {
               return $deviceSetting->value;
           }
       }

       return DeviceSettings::DEFAULT_PHOTO_EXTENSION;
   }

    /**
     * @param int $deviceId
     * @param string $value
     * @return void
     */
    public static function setDevicePhotoExtension(int $deviceId, string $value) {
        foreach (DeviceSettings::where('device_id', $deviceId)->get() as $deviceSettingItem) {
            if ($deviceSettingItem->name === DeviceSettings::PHOTO_EXTENSION) {
                $deviceSetting = DeviceSettings::where('id', $deviceSettingItem->id)->first();
                $deviceSetting->value = $value;
                $deviceSetting->save();
                return;
            }
        }

        $deviceSetting = new DeviceSettings();
        $deviceSetting->device_id = $deviceId;
        $deviceSetting->label = DeviceSettings::PHOTO_EXTENSION;
        $deviceSetting->name = DeviceSettings::PHOTO_EXTENSION;
        $deviceSetting->value = DeviceSettings::DEFAULT_PHOTO_EXTENSION;
        $deviceSetting->save();
   }

}
