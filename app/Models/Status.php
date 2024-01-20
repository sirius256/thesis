<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

    const ORDER_STATUS_NEW = 'new';
    const ORDER_STATUS_IN_PROGRESS = 'in_progress';
    const ORDER_STATUS_COMPLETE = 'complete';
    const ORDER_STATUSES_GROUP = 'order_statuses';

    public static function getCompleteStatusId() {
        $status = Status::where('name', Status::ORDER_STATUS_COMPLETE)
            ->where('group_name', Status::ORDER_STATUSES_GROUP)
            ->firstOrFail();

        return $status->id;
    }

}
