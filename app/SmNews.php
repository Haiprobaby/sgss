<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmNews extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\SmNewsSubCategory','sub_category_id','id');
    }
     public function category()
    {
        return $this->belongsTo('App\SmNewsCategory','category_id','id');
    }
}
