<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu_tbl';
    protected $guarded = [];

    public function thecategory()
    {
        return $this->belongsTo('App\Models\Category\Category','category_id');

    }


}
