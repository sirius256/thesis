<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public function setStatus($statusName) {
        $status = Status::where('name', $statusName)->firstOrFail();
        $this->status_id = $status->id;
    }

    public function getStatus() {
        $status = Status::findOrFail($this->status_id);

        return $status->name;
    }

    public function getModelName() {
        $device = Device::findOrFail($this->device_id);

        return $device->getModelName();
    }

}
