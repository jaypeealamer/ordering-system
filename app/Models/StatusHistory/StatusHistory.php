<?php

namespace App\Models\StatusHistory;

use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model
{
    protected $table = 'order_status_history_tbl';
    protected $guarded = [];

    public function theorders()
    {
        return $this->belongsTo('App\Models\Orders\Orders','order_id');
    }


}
