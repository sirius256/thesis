<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DeviceGalleryImage extends Model {

    public function getImageExtension() {
        return Storage::mimeType($this->original_image_url);

    }

    public function getImageSize() {
        return Storage::size($this->original_image_url);
    }

    public function getAssetUrl() {
        return route('administration.user.device.gallery.photo.view', ['photoId' => $this->id]);
    }

}
