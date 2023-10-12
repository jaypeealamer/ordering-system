<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders_tbl';
    protected $guarded = [];

    public function themenu()
    {
        return $this->belongsTo('App\Models\Menu\Menu','menu_id');

    }


}
