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

}
