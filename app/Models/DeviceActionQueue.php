<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceActionQueue extends Model {

    protected $table = 'device_action_queue';

    const STATUS_NEW = 'new';
    const STATUS_COMPLETED = 'completed';
    const ACTION_MAKE_PHOTO = 'make_photo';

    public function getSettings() {
        return json_decode($this->settings, true);
    }

    public function getSettingPhotoExtension() {
        $settings = $this->getSettings();

        return $settings[DeviceSettings::PHOTO_EXTENSION];
    }

}
