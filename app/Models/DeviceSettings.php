<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSettings extends Model {

   const PHOTO_EXTENSION = 'photo_extension';
   const DEFAULT_PHOTO_EXTENSION = 'image/jpeg';

   public static function getAvailablePhotoExtensions() {
       return [
           DeviceSettings::DEFAULT_PHOTO_EXTENSION
       ];
   }

}
